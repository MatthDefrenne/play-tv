<?php

use \mageekguy\atoum;

// $report = $script->addDefaultReport();

/*
LOGO
*/

// This will add the atoum logo before each run.
// $report->addField(new atoum\report\fields\runner\atoum\logo());

// This will add a green or red logo after each run depending on its status.
// $report->addField(new atoum\report\fields\runner\result\logo());


/*
UNITS TESTS SETUP
 */
// Define default bootstrap file.
$runner->setBootstrapFile(__DIR__.'/tests/bootstrap.php');


/*
CODE COVERAGE SETUP

// Please replace in next line "Project Name" by your project name and "/path/to/destination/directory" by your destination directory path for html files.
$coverageField = new atoum\report\fields\runner\coverage\html('Project Name', '/path/to/destination/directory');

// Please replace in next line http://url/of/web/site by the root url of your code coverage web site.
$coverageField->setRootUrl('http://url/of/web/site');

$report->addField($coverageField);
*/
