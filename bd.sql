create database cardRostow;
use cardRostow;
create table klient(
	id INT PRIMARY KEY AUTO_INCREMENT,
    fname VARCHAR(15) NOT NULL,
    lname VARCHAR(15) NOT NULL,
    surname VARCHAR(15) NOT NULL,
    birtdate DATE NOT NULL,
    seria INT NOT NULL,
    num INT NOT NULL,
    phone VARCHAR(15) NOT NULL,
    email VARCHAR(100),
    snils INT NOT NULL,
    oms INT NOT NULL,
    password_klient VARCHAR(20) NOT NULL
);

create table benefits(
	id INT PRIMARY KEY AUTO_INCREMENT,
    type_benefits VARCHAR(30) NOT NULL
);

insert into benefits (type_benefits) values
("Пенсионеры"),
("Студенты"),
("Школьники"),
("Многодетные семьи");
create table magazin_disc(
	id INT PRIMARY KEY AUTO_INCREMENT,
    id_type_ben INT NOT NULL,
    name_magazin VARCHAR(50),
    discount INT NOT NULL,
    photo VARCHAR(200) NOT NULL,
	FOREIGN KEY ( id_type_ben) REFERENCES benefits(id) ON DELETE CASCADE ON UPDATE CASCADE
);
insert into magazin_disc (id_type_ben,name_magazin, discount, photo) values
(1, "Пятерочка",10, "https://papik.pro/grafic/uploads/posts/2023-04/1681487064_papik-pro-p-pyaterochka-logotip-vektor-11.jpg"),
(4, "Пятерочка",20, "https://papik.pro/grafic/uploads/posts/2023-04/1681487064_papik-pro-p-pyaterochka-logotip-vektor-11.jpg"),
(1, "Магнит",15, "https://sun9-19.userapi.com/impf/c840634/v840634418/54977/jcaH047l1LU.jpg?size=600x450&quality=96&sign=bc9091951fba85cc113554e292a8d0ac&type=album"),
(4, "Магнит",15, "https://sun9-19.userapi.com/impf/c840634/v840634418/54977/jcaH047l1LU.jpg?size=600x450&quality=96&sign=bc9091951fba85cc113554e292a8d0ac&type=album"),
(1, "Транспорт",50, "https://static.rustore.ru/apk/2063485916/content/ICON/f85ad162-89b8-44e0-84f4-73a3b686e1a1.png"),
(2, "Транспорт",50, "https://static.rustore.ru/apk/2063485916/content/ICON/f85ad162-89b8-44e0-84f4-73a3b686e1a1.png"),
(3, "Транспорт",50, "https://static.rustore.ru/apk/2063485916/content/ICON/f85ad162-89b8-44e0-84f4-73a3b686e1a1.png"),
(4, "Транспорт",40, "https://static.rustore.ru/apk/2063485916/content/ICON/f85ad162-89b8-44e0-84f4-73a3b686e1a1.png"),
(1, "Социальная аптека",20, "https://avatars.mds.yandex.net/i?id=a49291ed36bce98c9181c8c89af6a7e095067792-11043615-images-thumbs&n=13"),
(4, "Социальная аптека",10, "https://avatars.mds.yandex.net/i?id=a49291ed36bce98c9181c8c89af6a7e095067792-11043615-images-thumbs&n=13"),
(1, "Аптека Вита",25, "https://avatars.mds.yandex.net/i?id=1a31393be753e9587e8125b396e0550aa3806153-5008643-images-thumbs&n=13"),
(4, "Аптека Вита",20, "https://avatars.mds.yandex.net/i?id=1a31393be753e9587e8125b396e0550aa3806153-5008643-images-thumbs&n=13"),
(2, "Офис класс", 35, "https://segment.ru/upload/usersImg/a2a/%D0%9E%D1%84%D0%B8%D1%81%20%D0%BA%D0%BB%D0%B0%D1%81%D1%811.png"),
(3, "Офис класс", 30, "https://segment.ru/upload/usersImg/a2a/%D0%9E%D1%84%D0%B8%D1%81%20%D0%BA%D0%BB%D0%B0%D1%81%D1%811.png");


create table benefits_of_klient(
	id INT PRIMARY KEY AUTO_INCREMENT,
    id_klient INT NOT NULL unique,
    id_benefits INT NOT NULL unique,
    photo blob NOT NULL,
    FOREIGN KEY (id_klient) REFERENCES klient(id) ON DELETE CASCADE ON UPDATE CASCADE,
    FOREIGN KEY (id_benefits) REFERENCES benefits(id) ON DELETE CASCADE ON UPDATE CASCADE
);

create table card(
	 id INT PRIMARY KEY AUTO_INCREMENT,
     id_klient INT NOT NULL unique,
     num INT NOT NULL,
     day_k int not null,
	year_k int not null,
     csv VARCHAR(20) NOT NULL,
     FOREIGN KEY (id_klient) REFERENCES klient(id) ON DELETE CASCADE ON UPDATE CASCADE
);


CREATE TABLE Attractions (
id_attr INT NOT NULL AUTO_INCREMENT PRIMARY KEY ,
 title_attr VARCHAR(100) NOT NULL ,
 content_attr VARCHAR(1500) NOT NULL ,
 img_attr VARCHAR(300) NOT NULL ,
 address_attr VARCHAR(300) NOT NULL ,
 geol_or_web_attr VARCHAR(500) NOT NULL 
);


CREATE TABLE Meropiatie (
id_event INT NOT NULL AUTO_INCREMENT  primary key,
 title_event VARCHAR(100) NOT NULL ,
 content_event VARCHAR(1500) NOT NULL ,
 adress_event VARCHAR(500) NOT NULL ,
 price_event INT(20) NOT NULL ,
 img_event VARCHAR(500) NOT NULL ,
 geol_or_web_event VARCHAR(800) NOT NULL
);


INSERT INTO Attractions (title_attr, content_attr, img_attr, address_attr, geol_or_web_attr) VALUES 
('Набережная Дона', 'Правый берег Дона — любимое место прогулок у ростовчан. Набережная названа в честь адмирала российского флота Фёдора Ушакова. Вдоль берега проложены пешеходные дорожки, по которым приятно ходить и любоваться гладью Дона. По пути встречаются контактные скульптуры, герои произведений Шолохова: Григорий и Аксинья в лодке, Дед Щукарь и Нахалёнок, а также местные персонажи — «Ростовчанка», «Дон-батюшка», «Рыбак». На набережной проводятся разные праздники, в том числе ежегодный фестиваль реки Дон. С причалов регулярно отправляются прогулочные катера.', 'https://cdn2.tu-tu.ru/image/pagetree_node_data/1/a978f4a3d9f7dfbfefe4b2059ff61170/', 'Береговая ул., 49а', "https://yandex.ru/maps/39/rostov-na-donu/house/beregovaya_ulitsa_49/Z0AYcQVnSEMAQFptfX5wdnRjZA==/"), 
('Ростов Арена', '«Ростов Арена» - крупнейший спортивный объект в Ростовской области. За последнее время он стал культовым местом в регионе, собирающим жителей разных социальных групп населения.«Ростов Арена» вошел в тройку самых посещаемых стадионов России.', 'https://cdn-m.sport24.ru/m/2cda/392f/165a/dcc5/099a/185c/f228/48fe/3200_10000_max.jpeg', 'ул. Левобережная, 2Б', 'https://rnd-arena.ru'),
('Улица Большая Садовая', 'Больша́я Садо́вая у́лица — центральная улица Ростова-на-Дону, одна из старейших и красивейших улиц города, в частности, на Большой Садовой находятся такие достопримечательности как Городской дом, Музыкальный театр, Дом Черновой, ЦУМ. Также на Большой Садовой размещены такие важные административные учреждения как городская, областная администрации и администрация полномочного представителя президента Российской Федерации в Южном федеральном округе.', 'https://avatars.mds.yandex.net/get-entity_search/1963038/425212654/SUx182_2x', 'Большая Садовая ул.', 'https://yandex.ru/maps/39/rostov-na-donu/geo/bolshaya_sadovaya_ulitsa/11131093/'),
('Особняк Маргариты Черновой', 'Потрясающий воображение двухэтажный особняк был возведен в далеком 1899 году под руководством главного архитектора — известного Николая Александровича Дорошенко. Здание носит имя Маргариты Никитичны Черновой — популярной актрисы XIX века, — которая проживала здесь в те времена. Особняк был спроектирован лично для актрисы в подарок от безгранично влюбленного в нее купца и промышленника Елпидифора Парамонова — того же самого, который воздвиг Парамоновские склады.В настоящее время особняк занимает Банк Москвы. Дом Маргариты Черновой охраняется государством и находится в статусе объекта культурного наследия.', 'https://img.tourister.ru/files/2/8/3/4/3/6/9/1/original.jpg?t=1713612726913', 'Халтуринский переулок, 47/27', 'https://yandex.ru/maps/39/rostov-na-donu/house/khalturinskiy_pereulok_47_27/Z0AYcQdiS0wEQFptfX5weH5mYw==/'),
('Музыкальный театр (Белый рояль)', 'Новый Ростовский государственный музыкальный театр стал настоящим культурным феноменом современной России. Он изменил свой статус и, являясь правопреемником театра музыкальной комедии, сегодня имеет в своем репертуаре оперы, балеты, оперетты, мюзиклы, рок-оперу, блестящие симфонические концерты. Театр одновременно опытен и юн, хранит старинные музыкальные традиции и смело экспериментирует в области современного искусства. Большой разнообразный репертуар требует значительных творческих сил. Был усилен симфонический оркестр, созданы оперная и балетная труппы. В последние годы увеличился коллектив исполнителей. Сегодня вокальная труппа насчитывает свыше 60 солистов, балетная – более 80 артистов, хор – свыше 70 артистов, состав оркестра – более 120 инструменталистов. Ежегодно театр показывает более 400 спектаклей и концертов на Большой (1038 зрительских мест) и Камерной (238 мест) сценах, а также в Театральной гостиной и Фойе партера.', 'https://avatars.mds.yandex.net/i?id=6b96397cba7c01f33437156345e6d389db279173-12475602-images-thumbs&n=13', 'Большая Садовая ул., 134', 'https://rostovopera.ru'),
('Кафедральный собор Рождества пресвятой Богородицы', 'Первый храм на этом месте открыт в 1781 году, современное здание в русско-византийском стиле построили в 1860 году по проекту К. Тона, автора Храма Христа Спасителя в Москве. Недавно закончили реставрацию. Верующие приезжают сюда, чтобы поклониться святыням — Донской иконе Божией матери и части пояса Пресвятой Богородицы. На подворье также расположены требный храм Иоанна Предтечи и колокольня 1875 года постройки, в ней находится храм Николая Чудотворца.', 'https://cdn2.tu-tu.ru/image/pagetree_node_data/1/406187e6beb908c0fa564d97375a3fd5/', 'ул. Станиславского, 58', 'https://rostovsobor.ru');


INSERT INTO Meropiatie (title_event, content_event, adress_event, price_event, img_event, geol_or_web_event) VALUES 
('Концерт The Hatters', 'The Hatters («Шляпники») — российская рок- и поп-группа, основанная в 2016 году в Санкт-Петербурге. В основной состав группы входят Юрий Музыченко, Павел Личадеев, Александр «Кикир» Анисимов, Дмитрий Вечеринин, Анна Музыченко.', 'Кроп Арена, проспект Шолохова, 270/1', '1300', 'https://thehatters.band/images/thehatters23.jpg', 'https://thehatters.band'),
('Спектакль Tasty-драма Гамлет', 'Единственный, в своём роде, проект, где можно попробовать пьесу на вкус. Сюжет классической пьесы раскрывается при помощи сторителлинга, где делается упор на эмоциях, которые главный герой пьесы испытывает в тот или иной момент. Но эти эмоции не озвучиваются, зритель должен сам «сгенерировать» их посредством дегустации определённых блюд.', 'ул. 18-я Линия, 8', '3000', 'https://img06.rl0.ru/afisha/e2086x1180p3x0f1594x902q65i/s3.afisha.ru/mediastorage/60/96/7e3851d713934683856815ea9660.jpeg', 'https://yandex.ru/maps/39/rostov-na-donu/house/ulitsa_18_ya_liniya_8/Z0AYcQFgSUADQFptfX5ycH9rZA==/'),
('Концерт Linkin Park в исполнении оркестра', 'Более двух часов бессмертных шедевров, которые определили целую эпоху. Струнный оркестр Hard Rock Orchestra (проект RockestraLive) даст незабываемый концерт. Камерная атмосфера единения и приятных воспоминаний погрузит каждого в невероятную красоту музыки Linkin Park.', 'Конгресс-холл ДГТУ', '1000', 'https://optim.tildacdn.com/tild6430-3338-4166-a162-313064376263/-/resize/356x/-/format/webp/bvlKz92eMKE.jpg', 'https://yandex.ru/maps/org/kongress_kholl_dgtu/48887648014/'),
('Фильм Сто лет тому вперед', 'Они живут в разных мирах. Коля Герасимов — в сегодняшней Москве, Алиса Селезнева — на сто лет позже. Коля – обычный парень, ему нет дела до будущего. Алису не отпускает прошлое: она должна найти маму, которую потеряла, когда была совсем ребенком. Встреча Алисы и Коли станет началом невероятных приключений, в которых нашим героям предстоит отвоевать у космических пиратов Вселенную, восстановить ход времени и обрести самое дорогое: любовь и дружбу.', 'Коммунистический, 30', '350', 'https://static.kinoafisha.info/k/movie_posters/220/upload/movie_posters/2/2/8/8356822/932445486927.jpg.webp', 'https://yandex.ru/maps/org/kinomaks/1053097038/'),
('Экскурсия в Мастерскую художественного стекла Игнатовых', 'Игнатова Лилия Аркадьевна, окончила Московское высшее художественно- промышленное училище (бывшее Строгановское), является художником по стеклу высшей категории, членом Союза Художников России, участник международных выставок и симпозиумов, ее работы находятся в музеях Германии, Австрии и России. Первоначально компания занималась изготовлением изделий из гутного стекла на базе своих мощностей при поддержке больших производственных холдингов. В 1996 году мастерская сделала акцент на работе с холодным стеклом (витражи и мозаика) и занимается изготовлением авторских витражей по сей день.', 'Волоколамская, 3, корп. 4', '850', 'https://ignglass.ru/upload/medialibrary/b52/b5299f93bb9715c51de926cd83e1d2d5.jpg', 'https://ignglass.ru'),
('Фильм Летучий корабль', 'Царь собирается выдать свою дочь Забаву за красавца Поля, единственного наследника богача Полкана. Вот только царевна хочет выйти замуж по любви. Ее неожиданное знакомство с простым, но честным и обаятельным матросом Иваном вносит смуту в планы хитреца Поля заполучить корону. И если в руках злодея темная магия и богатство, то на стороне Ивана — волшебные существа, любовь и мечта.', 'Малиновского, 25, ТК «Золотой Вавилон»', '420', 'https://img09.rl0.ru/afisha/e116x175q85i/s4.afisha.ru/mediastorage/aa/c1/675584edfd744175ba61b75cc1aa.jpg', 'https://yandex.ru/profile/1011421405')

