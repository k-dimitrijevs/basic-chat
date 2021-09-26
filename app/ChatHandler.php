<?php

namespace App;

use League\Csv\Reader;
use League\Csv\Writer;

class ChatHandler
{
    private string $file;
    private Reader $csvReader;
    private Writer $csvWriter;

    public function __construct(string $file)
    {
        $this->file = $file;
        $this->csvReader = Reader::createFromPath($file, 'r');
        $this->csvReader->setHeaderOffset(0);
        $this->csvReader->setDelimiter(',');

        $this->csvWriter = Writer::createFromPath($file, 'a+');
    }

    public function getCsvReader(): Reader
    {
        return $this->csvReader;
    }

    public function writeData(string $username, string $msg): void
    {
        $message = [$username, $msg];
        $this->csvWriter->insertOne($message);
    }
}