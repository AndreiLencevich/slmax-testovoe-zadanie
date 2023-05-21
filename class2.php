<?php

if (!class_exists('Class1')) {
    echo "Ошибка: Класс Class1 не найден.";
} else {
    // Здесь определяйте класс 2
    class Class2 {
        // Определение класса 2
    }
}

require_once 'Person.php';

class PeopleList
{
    public $peopleIds = [];

    public function __construct($filters = [])
    {
        // Предположим, что у вас есть метод для выполнения SQL-запросов к БД
        // и метод для поиска людей в БД на основе заданных фильтров

        // Выполняем поиск людей по всем полям БД на основе заданных фильтров
        $peopleData = $this->searchPeopleInDatabase($filters);

        // Заполняем массив с id людей
        foreach ($peopleData as $personData) {
            $this->peopleIds[] = $personData['id'];
        }
    }

    public function getPeople()
    {
        $people = [];

        foreach ($this->peopleIds as $personId) {
            try {
                // Создаем экземпляр класса Person на основе id
                $person = new Person($personId);
                $people[] = $person;
            } catch (Exception $e) {
                // Обработка ошибки, если не удалось найти человека с указанным id
                // Можно выбросить исключение, игнорировать или предпринять другие действия
                // В данном примере просто пропускаем этот id
                continue;
            }
        }

        return $people;
    }

    public function deletePeople()
    {
        // Предположим, что у вас есть метод для выполнения SQL-запросов к БД
        // и метод для удаления людей из БД по массиву id

        $this->deletePeopleFromDatabase($this->peopleIds);
    }
}


