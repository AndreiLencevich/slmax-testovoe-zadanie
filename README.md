# slmax-testovoe-zadanie
<?php

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
            // Загрузка информации о человеке из БД по указанному id
            // Предположим, что у вас есть метод для выполнения SQL-запросов к БД
            $personData = $this->loadPersonDataFromDatabase($id);
            // Валидация данных
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
        // Предположим, что у вас есть метод для выполнения SQL-запросов к БД
        // и метод для вставки новой записи или обновления существующей записи в БД
        if ($this->id !== null) {
            // Обновление существующей записи
            $this->updatePersonInDatabase();
        } else {
            // Вставка новой записи
            $this->insertPersonIntoDatabase();
        }
    }

    public function delete()
    {
        if ($this->id !== null) {
            // Предположим, что у вас есть метод для выполнения SQL-запросов к БД
            // и метод для удаления записи из БД по указанному id
            $this->deletePersonFromDatabase($this->id);
        }
    }

    public static function calculateAge($dateOfBirth)
    {
        // Логика для расчета возраста по дате рождения
        // Вернуть возраст (полных лет)
    }

    public static function getGenderText($gender)
    {
        // Логика для преобразования пола из двоичной системы в текстовую форму
        // Вернуть текстовое представление пола (муж, жен)
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
