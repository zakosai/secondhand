<?php

class DbcleanerCommand extends CConsoleCommand {

    public function getHelp() {
        echo "Deleted unconfirmed registration entries";
    }

    public function run($args) {
        $entries = Product::model()
                ->findBySql('SELECT * FROM `Product` ' .
                'WHERE TO_YEARS(`date`)+1 <= TO_YEARS(NOW())');
        echo count($entries) . " entries found\n";
        foreach ($entries as $entry) {
            $entry->delete();
        }
        
        $entries = Transaction::model()
                ->findBySql('SELECT * FROM `Product` ' .
                'WHERE TO_YEARS(`createDate`)+1 <= TO_YEARS(NOW())');
        echo count($entries) . " entries found\n";
        foreach ($entries as $entry) {
            $entry->delete();
        }
    }

}
?>
