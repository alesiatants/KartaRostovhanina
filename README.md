# KartaRostovhanina
 Представлена реализация проекта "Карта жителя Ростова", предлягающего пользователю системы и владельцу данной карты получить доступ к инфраструктуре города, оплачивать проезд в общественном транспорте со скидкой, посещать мероприятия, записываться к врачу, пользоваться рядом социальных льгот. Интерфейс пластиковой карты реализован с помощью технологий Apache (XAMPP), PHP и MYSQL.
# Процесс установки
1. Клонируете проект в папку xampp/htdocks/public/
2. Запускаете панель управления XAMPP
3. Стартуете Apache и MySQL
4. Переходите на admin панель MySQL либо заходите в Workbench и устанавливаете соединение с сервером
5. Открываете из склонированного проекта файл со скриптом для инициализации бд (bd.sql) и запускаете на выполнение.
6. В итоге будут созданны шесть таблиц 
7. Переходим к php файлам. Выбираем mainfunction.php и в конструкторе установки связи с сервером вводим персональный логин и пароль от MySQL
8. Открывем файл login.php в строке поиска http://localhost:[8080]/public/KartaRostovhanina/login.php
# Основной функционал
1. Регистрация/авторизация оределенной категории пользователей (пенсионеры, школьники, студенты, многодетные семьи) в системе с автоматическим присвоением реквизитов персональной карты. Также есть необходимость подтверждения льготного статуса с помощью соответствующей документации.
2. Просмотр/редактирования профиля.
3. Ознакомление с условием начисления скидок, с системой вцелом, с партнерами проекта
4. Просмотр свежих новостей Ростова-на-Дону
5. Ознакомление с собственными бонусами и скидками по льготному плану
6. Поиск и запись к врачу в ближайшей клинике
7. Знакомство с достопримечательностями города
8. Просмотр мероприятий в Ростове-на-Дону, их цены, описания с возможностью перехода и бранирования билетов
