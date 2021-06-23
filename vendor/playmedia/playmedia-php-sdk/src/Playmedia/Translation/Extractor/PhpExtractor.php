<?php

namespace Playmedia\Translation\Extractor;

use Symfony\Component\Finder\Finder;
use Symfony\Component\Translation\MessageCatalogue;
use Symfony\Component\Translation\Extractor\ExtractorInterface;
use PhpParser;

class PhpExtractor implements ExtractorInterface, PhpParser\NodeVisitor
{
    /**
     * Prefix for new found message.
     *
     * @var string
     */
    private $prefix = '';

    /**
     * @var MessageCatalogue
     */
    private $catalogue;

    /**
     * @var string
     */
    private $file;

    /**
     * @var array
     */
    private $ignoredFiles = [];

    public function setIgnoredFiles(array $ignoredFiles)
    {
        $this->ignoredFiles = $ignoredFiles;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function extract($directory, MessageCatalogue $catalogue)
    {
        $this->catalogue = $catalogue;

        $finder = new Finder();
        foreach ($this->ignoredFiles as $filename) {
            $finder->notName($filename);
        }
        $files = $finder->files()->name('*.php')->in($directory);

        $parser = new PhpParser\Parser(new PhpParser\Lexer());
        $traverser = new PhpParser\NodeTraverser();
        $traverser->addVisitor($this);

        foreach ($files as $file) {
            $this->file = $file;
            $stmts = $parser->parse(file_get_contents($file));
            $traverser->traverse($stmts);
        }
    }

    /**
     * {@inheritdoc}
     */
    public function setPrefix($prefix)
    {
        $this->prefix = $prefix;
    }

    public function enterNode(PhpParser\Node $node)
    {
        if (!$node instanceof PhpParser\Node\Expr\MethodCall
            || !is_string($node->name)
            || ('trans' !== strtolower($node->name) && 'transchoice' !== strtolower($node->name))) {
            return;
        }

        if (!$node->args[0]->value instanceof PhpParser\Node\Scalar\String) {
            $message = sprintf('Can only extract the translation id from a scalar string, but got "%s". Please refactor your code to make it extractable (in %s on line %d).',
                get_class($node->args[0]->value), $this->file, $node->args[0]->value->getLine());
            throw new \RuntimeException($message);
        }

        $id = $node->args[0]->value->value;

        $index = 'trans' === strtolower($node->name) ? 2 : 3;
        if (isset($node->args[$index])) {
            if (!$node->args[$index]->value instanceof PhpParser\Node\Scalar\String) {
                $message = sprintf('Can only extract the translation domain from a scalar string, but got "%s". Please refactor your code to make it extractable (in %s on line %d).',
                    get_class($node->args[$index]->value), $this->file, $node->args[$index]->value->getLine());
                throw new \RuntimeException($message);
            }
            $domain = $node->args[$index]->value->value;
        } else {
            $domain = 'messages';
        }

        $this->catalogue->set($id, $this->prefix.$id, $domain);
    }

    public function beforeTraverse(array $nodes)
    {
    }
    public function leaveNode(PhpParser\Node $node)
    {
    }
    public function afterTraverse(array $nodes)
    {
    }
}
