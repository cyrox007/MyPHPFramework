# PHP Фреймворк
## Description
РНР фреймворк построеный на архитектурном паттерне MVC. Model-View-Controller - схема разделения данных приложения, и управляющей логики на три отдельных компонента: модель, представление и контроллер - таким образом, что модификация каждого компонента может осуществляться независимо.
Разрабатывается из личного интереса. 
## What's new in this version?
Здесь буду писать, что было обновлено в каждой из версий...
### v0.0.1a
* косметические изменения класса view
* изменение класса model
* добавил .env для хранения настроек системы
### v0
* Настроил сервер на точку входа в файле index.php
* Соединил index.php c файлом ядра app/core.php
* core.php подключил файлы модулей ядра, которые будут отвечать за работу с БД, контроллером,видами и маршрутизации
* Работа контроллеров и вида пока на базовом уровне. Система может принимать запрос на главную страницу и отображать ее, но не умеет обрабатывать ошибки связанные с несуществующими страницами. 
* Зато есть шаблон главной страницы
## Future development
Проект находится на очень ранней стадии, но уже заложены некоторые основы работы системы. Как минимум, на данный момент она может отображать главную станицу. Однако, впереди еще много работы над ней. Необходимо многое реализовать:
* Настроить класс обработки GET запросов
* Нет подключения к БД и классов работы с ней.
* Нет шаблонизатора
