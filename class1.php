<?php

class Class1 {
    // Îïðåäåëåíèå êëàññà 1
}

class Person
{
    public $id;
    public $firstName;
    public $lastName;
    public $dateOfBirth;
    public $gender;
    public $birthCity;

    public function __construct($id = null)
    {
        if ($id !== null) {
            // Çàãðóçêà èíôîðìàöèè î ÷åëîâåêå èç ÁÄ ïî óêàçàííîìó id
            // Ïðåäïîëîæèì, ÷òî ó âàñ åñòü ìåòîä äëÿ âûïîëíåíèÿ SQL-çàïðîñîâ ê ÁÄ
            $personData = $this->loadPersonDataFromDatabase($id);

            // Âàëèäàöèÿ äàííûõ
            if ($personData !== null) {
                $this->id = $personData['id'];
                $this->firstName = $personData['first_name'];
                $this->lastName = $personData['last_name'];
                $this->dateOfBirth = $personData['date_of_birth'];
                $this->gender = $personData['gender'];
                $this->birthCity = $personData['birth_city'];
            } else {
                throw new Exception('Person with ID ' . $id . ' not found.');
            }
        }
    }

    public function save()
    {
        // Ïðåäïîëîæèì, ÷òî ó âàñ åñòü ìåòîä äëÿ âûïîëíåíèÿ SQL-çàïðîñîâ ê ÁÄ
        // è ìåòîä äëÿ âñòàâêè íîâîé çàïèñè èëè îáíîâëåíèÿ ñóùåñòâóþùåé çàïèñè â ÁÄ
        if ($this->id !== null) {
            // Îáíîâëåíèå ñóùåñòâóþùåé çàïèñè
            $this->updatePersonInDatabase();
        } else {
            // Âñòàâêà íîâîé çàïèñè
            $this->insertPersonIntoDatabase();
        }
    }

    public function delete()
    {
        if ($this->id !== null) {
            // Ïðåäïîëîæèì, ÷òî ó âàñ åñòü ìåòîä äëÿ âûïîëíåíèÿ SQL-çàïðîñîâ ê ÁÄ
            // è ìåòîä äëÿ óäàëåíèÿ çàïèñè èç ÁÄ ïî óêàçàííîìó id
            $this->deletePersonFromDatabase($this->id);
        }
    }

    public static function calculateAge($dateOfBirth)
    {
        // Ëîãèêà äëÿ ðàñ÷åòà âîçðàñòà ïî äàòå ðîæäåíèÿ
        // Âåðíóòü âîçðàñò (ïîëíûõ ëåò)
    }

    public static function getGenderText($gender)
    {
        // Ëîãèêà äëÿ ïðåîáðàçîâàíèÿ ïîëà èç äâîè÷íîé ñèñòåìû â òåêñòîâóþ ôîðìó
        // Âåðíóòü òåêñòîâîå ïðåäñòàâëåíèå ïîëà (ìóæ, æåí)
    }

    public function formatPerson($calculateAge = false, $getGenderText = false)
    {
        $formattedPerson = new stdClass();
        $formattedPerson->id = $this->id;
        $formattedPerson->firstName = $this->firstName;
        $formattedPerson->lastName = $this->lastName;

        if ($calculateAge) {
            $formattedPerson->age = self::calculateAge($this->dateOfBirth);
        } else {
            $formattedPerson->dateOfBirth = $this->dateOfBirth;
        }

        if ($getGenderText) {
            $formattedPerson->gender = self::getGenderText($this->gender);
        } else {
            $formattedPerson->gender = $this->gender;
        }

        $formattedPerson->birthCity = $this->birth
