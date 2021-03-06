-- CREATE DATABASE database;
CREATE TABLE usuarios(
    id SERIAL PRIMARY KEY,
    nome VARCHAR(255) NOT NULL,
    cpf VARCHAR(14),
    login VARCHAR(255) NOT NULL,
    senha VARCHAR(32) NOT NULL,
    email VARCHAR(255) NOT NULL,
    role VARCHAR(32) NOT NULL
);

CREATE TABLE clientes(
    id SERIAL PRIMARY KEY,
    nasc DATE,
    one VARCHAR(15),
    cel VARCHAR(15),
    endereco VARCHAR(255),
    cidade VARCHAR(255),
    uf VARCHAR(255),
    cod_usuario INT REFERENCES usuarios(id)
);

CREATE TABLE genero(
    id SERIAL PRIMARY KEY,
    nome VARCHAR(255) NOT NULL,
    descricao TEXT NOT NULL
);

CREATE TABLE artista(
    id SERIAL PRIMARY KEY,
    nome VARCHAR(255) NOT NULL
);

CREATE TABLE album(
    id SERIAL PRIMARY KEY,
    nome VARCHAR(255) NOT NULL,
    ano INT,
    capa TEXT
);

CREATE TABLE faixa(
    id SERIAL PRIMARY KEY,
    nome VARCHAR(255) NOT NULL,
    posicao INT,
    duracao VARCHAR(25),
    cod_artista INT REFERENCES artista(id),
    cod_album INT REFERENCES album(id),
    cod_genero INT REFERENCES genero(id)
);

CREATE TABLE midia(
    id SERIAL PRIMARY KEY,
    sigla VARCHAR(6),
    nome VARCHAR(255) NOT NULL,
    descricao TEXT NOT NULL
);

CREATE TABLE produto(
    id SERIAL PRIMARY KEY,
    nome VARCHAR(255) NOT NULL,
    cod_album INT REFERENCES album(id),
    cod_midia INT REFERENCES midia(id),
    preco FLOAT,
    qtd_estoque INT
);

CREATE TABLE compra (
	id SERIAL PRIMARY KEY,
	cod_usuaro INT NOT NULL REFERENCES usuarios(id),
	data_compra TIMESTAMP DEFAULT (CURRENT_TIMESTAMP)
);

CREATE TABLE item_compra(
	cod_produto INT NOT NULL REFERENCES produto(id),
	cod_compra INT NOT NULL REFERENCES compra(id),
	qntd INT NOT NULL,
	valor FLOAT NOT NULL,
	CONSTRAINT pk_item PRIMARY KEY (cod_produto,cod_compra)
);

INSERT INTO usuarios (nome, cpf, login, senha, email, role) 
VALUES ('Administrador', '000.000.000-00', 'admin', MD5('123456'), 'admin@local.com', 'ADM');

INSERT INTO clientes(datadenasc, telefone, celular, endereco, cidade, estado, cod_usuario)
VALUES ('01-01-2000', '(00)0000-0000','(00)00000-0000','Rua XXXXXXXXXX, Nº999','XXXXXXXXX XXXXXX','XXXXXXXX',1);

INSERT INTO "usuarios" (nome,cpf,login,senha,email,role) VALUES ('Ayanna','16390613-3115','Zelda','1690051700099','porta.elit.a@purus.org','cliente'),('Abbot','16760314-4523','Ivy','1654122385799','felis.purus.ac@sit.co.uk','cliente'),('Mechelle','16880521-8016','Oliver','1605120267099','et.netus@ametorciUt.ca','cliente'),('Anika','16410715-9362','Tyler','1616071437799','metus.eu.erat@est.com','cliente'),('Dennis','16291104-4069','Honorato','1667111181299','fringilla@Donec.edu','cliente'),('Xandra','16201211-6642','Ishmael','1600092637399','amet@Quisquetinciduntpede.net','cliente'),('Clio','16790402-0505','Nerea','1608060846899','molestie@ultricesaauctor.edu','cliente'),('Warren','16590901-6742','Harriet','1630102338799','malesuada.Integer.id@eu.com','cliente'),('Moses','16200921-6876','Kylee','1695080171599','ante.iaculis.nec@quis.com','cliente'),('Patricia','16700205-8613','Amos','1676041188899','Donec.felis@musAeneaneget.com','cliente');
INSERT INTO "usuarios" (nome,cpf,login,senha,email,role) VALUES ('Brady','16230410-9891','Audra','1688112284899','ullamcorper.Duis@metussitamet.ca','cliente'),('Uma','16051223-4345','Briar','1666041979099','non.enim@nuncidenim.com','cliente'),('Harper','16080314-2264','Brett','1614021865099','et.magnis@duinec.org','cliente'),('Salvador','16861104-5660','Keely','1618020389399','lobortis.quam@egettincidunt.co.uk','cliente'),('Elmo','16550618-0446','Emmanuel','1647070287999','erat.Etiam@enim.ca','cliente'),('Dolan','16650915-9734','Jane','1691031268999','laoreet.ipsum@nonummyipsum.ca','cliente'),('Portia','16180517-4156','Janna','1644071736399','ultricies.sem.magna@maurissitamet.com','cliente'),('Shay','16410115-7784','Illana','1605091073299','orci.luctus@Nullamvelitdui.org','cliente'),('Kieran','16970820-1067','Felix','1614061058099','nascetur@dignissim.ca','cliente'),('Fatima','16150926-7629','Morgan','1668082709099','sed.orci.lobortis@Suspendissenonleo.edu','cliente');
INSERT INTO "usuarios" (nome,cpf,login,senha,email,role) VALUES ('Nehru','16481117-6769','Damian','1674052607899','enim@necmollisvitae.ca','cliente'),('Adrienne','16350712-4547','Roth','1640030748299','facilisis.lorem.tristique@interdum.net','cliente'),('Hashim','16530205-5693','Conan','1682052767999','ridiculus.mus@consectetuer.co.uk','cliente'),('Medge','16570629-2231','Tatyana','1635030469799','et.libero.Proin@magna.com','cliente'),('Dorian','16280407-9818','Alec','1686020184299','dis@aliquam.edu','cliente'),('Clementine','16090622-8291','Aladdin','1607031872399','mattis.velit.justo@liberomauris.org','cliente'),('Athena','16640512-1705','Mona','1622122821599','massa.Integer.vitae@velitdui.co.uk','cliente'),('Audrey','16900525-3936','Elliott','1688101094099','dictum@nisl.edu','cliente'),('April','16310617-2566','Scarlet','1607060952299','velit.eget.laoreet@vestibulumMaurismagna.ca','cliente'),('Dawn','16050710-4669','Xaviera','1610033037199','tristique.ac.eleifend@ut.org','cliente');
INSERT INTO "usuarios" (nome,cpf,login,senha,email,role) VALUES ('Maggie','16550312-9982','Cora','1699082905299','eu.nibh@Maecenasiaculisaliquet.ca','cliente'),('Fulton','16910930-8222','Lee','1633112494599','taciti.sociosqu@habitant.co.uk','cliente'),('Summer','16341204-8575','Cole','1625110379599','sollicitudin.commodo.ipsum@hendreritDonecporttitor.com','cliente'),('Howard','16260317-1493','Emerson','1603012439299','lacus@nisia.com','cliente'),('Blake','16041217-7271','Candace','1657092626499','tincidunt@Pellentesquetincidunt.co.uk','cliente'),('Logan','16690205-9457','Acton','1673110623099','sapien.Cras.dolor@temporestac.co.uk','cliente'),('Perry','16730309-4390','Shelley','1606102996199','aliquet@sed.ca','cliente'),('Odette','16691213-4076','Tara','1689081108699','nibh@Donectincidunt.com','cliente'),('Gloria','16530724-7865','Emily','1630082189799','feugiat@scelerisquescelerisque.com','cliente'),('Amir','16340603-9267','Channing','1639051878999','gravida@id.com','cliente');
INSERT INTO "usuarios" (nome,cpf,login,senha,email,role) VALUES ('Stuart','16481211-5089','Zephr','1653062620499','vitae@cursus.co.uk','cliente'),('Jaime','16130411-6443','Kirby','1633020698999','Nulla.eu@magnaSuspendisse.org','cliente'),('Brielle','16760423-3556','Ciaran','1601091747799','consectetuer.ipsum@lorem.org','cliente'),('Curran','16051227-7666','Glenna','1683071649799','nec.ligula@convallis.co.uk','cliente'),('India','16150923-7689','Yvonne','1664010381799','egestas@CrasinterdumNunc.com','cliente'),('Dennis','16750415-1361','Claudia','1603052745099','augue.scelerisque.mollis@Suspendisseac.co.uk','cliente'),('Brennan','16041229-7848','Meredith','1669080503099','Phasellus@Sed.edu','cliente'),('Phyllis','16710207-4551','Selma','1668110780099','Quisque.ornare.tortor@ultriciesadipiscingenim.org','cliente'),('Cassady','16510518-6885','Dorian','1620012972199','condimentum@condimentum.org','cliente'),('Laurel','16310316-5316','Elijah','1636031965799','erat@imperdiet.ca','cliente');
INSERT INTO "usuarios" (nome,cpf,login,senha,email,role) VALUES ('Indira','16121125-8213','Lane','1620110912199','Sed@hendrerit.edu','cliente'),('Sydnee','16250917-1381','Carla','1658021399399','Suspendisse@Duis.edu','cliente'),('Constance','16660519-6960','Tanek','1650020850599','non.enim.Mauris@auctor.edu','cliente'),('Jasmine','16351009-0750','Fallon','1694102133899','diam.dictum.sapien@interdum.edu','cliente'),('Cheryl','16120314-6020','Clare','1650030671699','nec.malesuada@aliquamenimnec.org','cliente'),('Duncan','16240703-7379','Francesca','1606091575699','est@Nuncullamcorper.com','cliente'),('Nita','16391124-7520','Ava','1623030899699','Cum.sociis.natoque@nuncestmollis.co.uk','cliente'),('Kimberley','16231110-1386','Amena','1601060882399','luctus.aliquet@uterosnon.edu','cliente'),('Laith','16320623-2393','Stone','1623101009799','quis.diam.Pellentesque@ac.org','cliente'),('Caryn','16030627-8029','Fleur','1616021047999','mus.Aenean.eget@vel.co.uk','cliente');
INSERT INTO "usuarios" (nome,cpf,login,senha,email,role) VALUES ('Caldwell','16110125-0379','Karina','1643042649899','lobortis.nisi@orciPhasellus.ca','cliente'),('Hilary','16540709-8945','Kareem','1635121976099','lobortis.tellus@ultricesmaurisipsum.com','cliente'),('Margaret','16901210-9022','Mara','1638101520099','semper.dui@egetmetus.co.uk','cliente'),('Mira','16950715-7270','Desirae','1687051450699','turpis.vitae.purus@utpharetra.edu','cliente'),('Mara','16741115-5141','Stewart','1641111610499','pharetra@aliquet.edu','cliente'),('Amal','16580902-0000','Kenyon','1619122866599','lectus@tempus.com','cliente'),('Remedios','16420813-0999','Jade','1611060163199','molestie.orci@SeddictumProin.com','cliente'),('Bryar','16730812-3343','Quemby','1653043074099','bibendum.fermentum@posuere.co.uk','cliente'),('Geraldine','16460730-8451','Melvin','1695011101699','metus.In.nec@tinciduntDonec.net','cliente'),('Chantale','16080419-3225','Lysandra','1621030982099','ornare.Fusce.mollis@lobortismaurisSuspendisse.com','cliente');
INSERT INTO "usuarios" (nome,cpf,login,senha,email,role) VALUES ('Amos','16071223-9623','Illana','1647041479999','neque@pretiumaliquetmetus.co.uk','cliente'),('Nita','16650808-1863','Bruno','1635091131199','amet.nulla.Donec@rutrum.co.uk','cliente'),('Blaze','16910317-0354','Quynn','1612061638499','Quisque@necmalesuada.edu','cliente'),('Anne','16180102-1104','Kelsey','1667070771199','tellus.lorem.eu@metus.edu','cliente'),('Britanney','16591105-6272','Alexandra','1673050331199','enim@semmolestiesodales.org','cliente'),('Ciaran','16920308-1832','Scarlett','1653081183599','sollicitudin@non.co.uk','cliente'),('Sebastian','16390222-1336','Daphne','1614030319199','egestas.Duis@maurisaliquam.ca','cliente'),('Charles','16960128-7692','Palmer','1600011057499','egestas.urna@vitaesemper.edu','cliente'),('Stone','16600617-1901','Dante','1665021795399','eleifend.non.dapibus@aliquetnecimperdiet.co.uk','cliente'),('Shana','16240929-1958','Clinton','1653083094899','nonummy.Fusce.fermentum@faucibus.edu','cliente');
INSERT INTO "usuarios" (nome,cpf,login,senha,email,role) VALUES ('Nelle','16861212-2856','Kareem','1647110856999','purus.mauris@consequatpurusMaecenas.com','cliente'),('Ciaran','16211122-6862','Mona','1680112028099','sapien.cursus@lacinia.ca','cliente'),('Claudia','16720420-2274','Alfreda','1617071777499','aliquet.Phasellus.fermentum@scelerisquescelerisque.org','cliente'),('Leslie','16810927-3360','Imogene','1671120198399','mollis.non@nunc.ca','cliente'),('Iona','16340622-5346','Ivana','1618072923999','elit.pellentesque@arcu.net','cliente'),('Taylor','16710106-6921','Alfreda','1605013026599','Suspendisse.ac@ipsum.edu','cliente'),('Allen','16840315-7426','Charissa','1658101662799','ac.orci.Ut@hendrerit.edu','cliente'),('Zenaida','16660801-2958','Colorado','1610031418399','molestie.orci.tincidunt@dolor.com','cliente'),('Herman','16351129-3502','Hyatt','1693100512799','facilisis.non.bibendum@augue.co.uk','cliente'),('Jaden','16660911-4480','Salvador','1601021081399','purus@habitant.ca','cliente');
INSERT INTO "usuarios" (nome,cpf,login,senha,email,role) VALUES ('Stacy','16821018-7343','Sydney','1621101727699','nec.quam@felis.edu','cliente'),('Laurel','16000727-0077','India','1612062883299','massa@tellus.com','cliente'),('Hiroko','16140503-0592','Jorden','1698112786699','Suspendisse.eleifend@Curabiturutodio.co.uk','cliente'),('Rachel','16910605-8663','Plato','1661080397099','enim.nec.tempus@pharetra.com','cliente'),('Jessamine','16300819-2670','Wylie','1690100152199','nascetur.ridiculus@laciniavitaesodales.net','cliente'),('Blossom','16260429-7511','Bernard','1606100184499','arcu.Sed.et@Donecsollicitudin.net','cliente'),('India','16471125-5390','Patricia','1683080746499','orci.Phasellus@et.com','cliente'),('Erica','16791005-0959','Nevada','1680050460299','Pellentesque@nibhPhasellus.ca','cliente'),('Zephania','16680720-8803','Giacomo','1627041799099','at@elitCurabitur.co.uk','cliente'),('Channing','16150801-5284','Jessamine','1692110743799','sapien@velitjustonec.net','cliente');

INSERT INTO "clientes" (datadenasc,telefone,celular,endereco,cidade,estado,cod_usuario) VALUES ('06-04-1982','1-495-701-2390','(970) 837-2258','P.O. Box 318, 2375 Tortor. Rd.','Maracanaú','Ceará',1),('02-09-1984','1-422-777-0789','(440) 918-6415','710-1987 Ipsum. Road','Feira de Santana','BA',2),('12-25-1970','1-813-353-9728','(399) 606-5376','Ap #979-2788 In, Rd.','Belford Roxo','RJ',3),('12-04-1986','1-799-910-0726','(465) 413-7305','9059 Dictum. St.','Cabo de Santo Agostinho','Pernambuco',4),('09-15-1986','1-888-719-4546','(481) 506-5441','8962 Id, Rd.','Barra do Corda','Maranhão',5),('07-10-1968','1-557-419-8854','(819) 499-8500','351-8153 Urna Avenue','Governador Valadares','Minas Gerais',6),('12-03-1958','1-630-864-0903','(661) 536-6608','Ap #128-2272 Laoreet, St.','Santa Maria','RS',7),('07-21-1972','1-607-797-3402','(198) 329-7522','794-8255 Blandit Avenue','Foz do Iguaçu','Paraná',8),('12-23-1972','1-935-707-7258','(682) 209-7087','P.O. Box 166, 3751 Semper Ave','Ipatinga','MG',9),('12-19-1960','1-974-156-7471','(774) 140-5201','422-959 Nibh. Rd.','Ponta Grossa','Paraná',10);
INSERT INTO "clientes" (datadenasc,telefone,celular,endereco,cidade,estado,cod_usuario) VALUES ('02-07-1972','1-775-375-1659','(108) 803-0633','P.O. Box 362, 2731 Ipsum St.','Juiz de Fora','MG',11),('11-27-1999','1-985-236-8347','(620) 303-7905','P.O. Box 998, 2876 Duis St.','Canoas','RS',12),('08-14-1984','1-693-514-2718','(672) 773-6982','2407 Pede. St.','Chapadinha','Maranhão',13),('05-09-1997','1-766-911-9692','(986) 222-6903','1234 Nunc Rd.','Piracicaba','São Paulo',14),('06-01-1989','1-151-957-1275','(622) 329-7979','9025 Ac Road','Juazeiro','BA',15),('08-29-1962','1-751-111-1117','(194) 665-2857','859-8999 Neque St.','Recife','Pernambuco',16),('12-26-1981','1-623-738-0443','(822) 708-6192','Ap #862-8495 Gravida. Avenue','Campinas','São Paulo',17),('04-14-1997','1-412-429-0533','(397) 571-0672','454 Vel, Av.','Piracicaba','SP',18),('10-10-1979','1-745-963-7547','(441) 889-0610','Ap #899-8618 Vitae Street','Florianópolis','Santa Catarina',19),('11-13-1978','1-277-937-3253','(333) 384-0719','6341 Quam Road','Mogi das Cruzes','SP',20);
INSERT INTO "clientes" (datadenasc,telefone,celular,endereco,cidade,estado,cod_usuario) VALUES ('10-26-1974','1-268-860-0741','(699) 126-1233','1235 Nunc Av.','Ipatinga','Minas Gerais',21),('02-14-1996','1-175-659-1118','(289) 477-5957','P.O. Box 633, 9731 Praesent Av.','Porto Alegre','RS',22),('09-20-1962','1-676-928-6617','(361) 681-8181','Ap #102-7228 Fusce Ave','São João de Meriti','Rio de Janeiro',23),('04-23-1981','1-260-915-3870','(609) 299-1884','820-6955 Tristique Road','Paranaguá','PR',24),('04-17-1968','1-138-505-5143','(347) 532-3683','4393 Mauris. Ave','Campinas','SP',25),('04-07-1974','1-228-140-9737','(109) 864-5052','543-4324 Euismod Av.','Caruaru','PE',26),('03-31-1992','1-693-734-4841','(751) 589-9241','3714 Bibendum Avenue','Diadema','São Paulo',27),('07-09-1977','1-729-156-2180','(989) 230-6281','P.O. Box 188, 4560 Proin St.','Sousa','PB',28),('03-11-1965','1-902-326-9225','(236) 139-6664','Ap #671-6301 Leo Street','Belford Roxo','Rio de Janeiro',29),('04-22-1981','1-794-897-5192','(798) 852-9935','Ap #397-4200 Sed St.','Belford Roxo','RJ',30);
INSERT INTO "clientes" (datadenasc,telefone,celular,endereco,cidade,estado,cod_usuario) VALUES ('12-06-1987','1-790-903-8727','(864) 502-3670','759-1427 Ad Road','Timon','Maranhão',31),('10-18-1988','1-425-556-2421','(171) 835-3187','Ap #517-9636 Nam Rd.','Mogi das Cruzes','São Paulo',32),('01-20-1997','1-931-439-7573','(701) 730-2841','5770 Ipsum Rd.','Ilhéus','Bahia',33),('09-24-1969','1-100-308-4881','(564) 692-5285','834-1164 Enim. Avenue','Rio de Janeiro','Rio de Janeiro',34),('07-30-1960','1-841-404-3977','(244) 459-4060','869-8722 Et Rd.','Maracanaú','CE',35),('12-15-1998','1-279-903-9614','(820) 727-3680','P.O. Box 784, 6422 Dictum Rd.','Carapicuíba','SP',36),('07-11-1995','1-713-659-0960','(145) 170-1063','P.O. Box 443, 8684 Nunc Ave','Abaetetuba','Pará',37),('10-05-1994','1-775-120-4436','(809) 654-6212','5620 Ornare St.','Ilhéus','Bahia',38),('02-05-1999','1-684-717-0886','(160) 368-9174','Ap #793-7833 Magna. Ave','Niterói','RJ',39),('10-01-1993','1-394-513-5821','(597) 605-7143','2887 Parturient St.','Sete Lagoas','MG',40);
INSERT INTO "clientes" (datadenasc,telefone,celular,endereco,cidade,estado,cod_usuario) VALUES ('05-07-1995','1-108-260-9558','(478) 179-2663','9507 Venenatis St.','Montes Claros','Minas Gerais',41),('03-18-1983','1-241-923-7080','(529) 455-6918','Ap #591-6588 Pede Avenue','Cabo de Santo Agostinho','PE',42),('10-31-1982','1-662-147-4942','(767) 204-8121','P.O. Box 800, 8613 Tellus. Road','Cabo de Santo Agostinho','Pernambuco',43),('03-01-2000','1-418-432-1119','(166) 156-7421','P.O. Box 740, 3336 Malesuada Street','Ribeirão Preto','SP',44),('07-16-1978','1-115-124-6122','(879) 447-2133','P.O. Box 614, 153 Volutpat Street','Nova Iguaçu','RJ',45),('04-20-1972','1-341-678-6796','(675) 759-8951','Ap #118-6723 Quis St.','Montes Claros','MG',46),('11-28-1966','1-148-279-1400','(392) 406-5506','407-5272 Diam. St.','Itabuna','Bahia',47),('09-18-1970','1-487-160-1100','(863) 769-4533','333-196 Orci Road','Feira de Santana','BA',48),('11-22-1977','1-799-625-6441','(929) 125-6456','341-684 Nunc St.','Jundiaí','SP',49),('05-15-1969','1-529-299-2638','(770) 355-4801','P.O. Box 924, 2905 In Street','Guarulhos','São Paulo',50);
INSERT INTO "clientes" (datadenasc,telefone,celular,endereco,cidade,estado,cod_usuario) VALUES ('01-24-1983','1-624-480-8177','(723) 922-9192','P.O. Box 344, 1959 Enim Ave','Cametá','Pará',51),('08-22-1987','1-203-986-6231','(925) 451-7048','Ap #719-5458 Est. Rd.','Parauapebas','PA',52),('03-04-1996','1-795-191-8493','(713) 294-4102','Ap #330-5196 Enim Rd.','Diadema','SP',53),('05-08-1966','1-936-274-9687','(405) 242-5267','P.O. Box 622, 1082 Lectus St.','Salvador','Bahia',54),('12-01-1974','1-836-101-6887','(574) 920-3643','Ap #854-9101 Nullam Rd.','Guarapuava','PR',55),('06-02-1972','1-636-633-5691','(915) 824-8885','8531 Rutrum Rd.','Cascavel','PR',56),('04-23-1974','1-119-184-7965','(625) 728-3566','Ap #735-4460 Aliquam Street','Diadema','SP',57),('08-23-1978','1-887-237-1065','(812) 146-3852','Ap #190-3185 Maecenas Av.','Carapicuíba','São Paulo',58),('03-15-1986','1-949-114-1270','(385) 824-1874','P.O. Box 768, 2694 Lectus Ave','Luziânia','Goiás',59),('08-19-2000','1-246-936-9696','(200) 773-8506','Ap #617-2132 Dui, Rd.','Maracanaú','Ceará',60);
INSERT INTO "clientes" (datadenasc,telefone,celular,endereco,cidade,estado,cod_usuario) VALUES ('07-17-1969','1-542-674-6104','(338) 352-6187','4197 Rutrum. Road','Patos','PB',61),('11-24-1994','1-450-301-6685','(486) 996-3844','P.O. Box 671, 1314 Neque Avenue','Rio de Janeiro','Rio de Janeiro',62),('04-17-1985','1-171-745-2471','(233) 287-6327','Ap #275-4207 Euismod Rd.','Feira de Santana','BA',63),('11-17-1992','1-101-306-4839','(620) 958-6281','153-8268 A, Road','Mauá','São Paulo',64),('01-21-1964','1-765-580-8646','(725) 393-5611','6089 Odio Rd.','Betim','Minas Gerais',65),('12-15-1987','1-317-886-8619','(559) 468-6236','Ap #474-852 Et Avenue','Osasco','São Paulo',66),('05-23-1963','1-728-735-0033','(992) 952-0094','P.O. Box 918, 5043 Interdum Rd.','Goiânia','GO',67),('05-10-1982','1-883-489-4736','(181) 621-3505','Ap #191-8212 Quis, Avenue','Parauapebas','Pará',68),('05-19-1981','1-967-136-5058','(944) 539-1396','Ap #863-9061 Pharetra. Av.','Maranguape','Ceará',69),('06-04-1961','1-434-813-7449','(207) 311-3845','829 Sollicitudin Ave','Caxias do Sul','RS',70);
INSERT INTO "clientes" (datadenasc,telefone,celular,endereco,cidade,estado,cod_usuario) VALUES ('02-16-1972','1-968-974-3949','(727) 929-5197','Ap #764-5940 Donec Avenue','Jundiaí','SP',71),('03-30-1982','1-532-559-1663','(151) 526-2292','Ap #436-2855 Ipsum Ave','Santarém','PA',72),('06-05-1973','1-370-995-2673','(977) 152-4241','468-204 In Avenue','Ribeirão Preto','São Paulo',73),('10-31-1999','1-243-821-6315','(771) 848-1736','115-5417 Egestas. Ave','Belém','Pará',74),('06-09-1967','1-561-823-6409','(631) 153-3721','Ap #307-6238 Vulputate, Avenue','Carapicuíba','SP',75),('12-12-1958','1-563-212-7300','(980) 524-1483','P.O. Box 802, 9618 Luctus St.','Londrina','Paraná',76),('01-19-1984','1-641-126-2809','(899) 205-4368','Ap #281-8046 Elementum Road','Itajaí','Santa Catarina',77),('12-31-1972','1-938-494-1741','(151) 257-3270','438 Sodales St.','Duque de Caxias','RJ',78),('07-09-1963','1-876-354-9363','(778) 340-3649','3682 In, Av.','Betim','Minas Gerais',79),('01-23-1967','1-951-951-7092','(859) 303-8209','8602 A Rd.','Jaboatão dos Guararapes','PE',80);
INSERT INTO "clientes" (datadenasc,telefone,celular,endereco,cidade,estado,cod_usuario) VALUES ('04-16-1981','1-821-155-5809','(441) 965-0624','706-4685 Donec Avenue','Ilhéus','Bahia',81),('08-17-1971','1-642-415-7559','(867) 125-6986','P.O. Box 752, 3451 Ipsum Avenue','Canoas','RS',82),('03-18-1975','1-483-525-9468','(444) 915-8159','P.O. Box 632, 3921 Varius Rd.','Gravataí','Rio Grande do Sul',83),('06-13-1962','1-696-610-6090','(986) 428-6486','8162 Augue Road','Santarém','Pará',84),('06-16-1992','1-856-356-1921','(224) 477-6185','795-7214 Tellus. St.','Chapecó','Santa Catarina',85),('03-05-1965','1-912-900-1650','(236) 415-4444','5302 Penatibus Rd.','Jundiaí','SP',86),('07-18-1999','1-674-681-4930','(310) 143-4679','2783 Et, Street','Piracicaba','SP',87),('09-18-1997','1-756-999-6483','(844) 699-9102','8116 Sodales Avenue','Santa Maria','RS',88),('01-05-1993','1-103-601-6632','(479) 303-4180','8974 Proin Av.','Ribeirão Preto','São Paulo',89),('10-14-1988','1-228-867-4075','(829) 292-6031','2044 Neque Rd.','São Gonçalo','Rio de Janeiro',90);
INSERT INTO "clientes" (datadenasc,telefone,celular,endereco,cidade,estado,cod_usuario) VALUES ('12-23-1989','1-100-481-1776','(341) 191-2477','815-5142 Et Road','Recife','PE',91),('11-20-1998','1-819-692-8908','(901) 350-3201','6228 Dictum Rd.','Paranaguá','Paraná',92),('10-21-1967','1-920-987-8475','(873) 865-6982','5335 Blandit Road','Montes Claros','Minas Gerais',93),('12-27-1963','1-547-729-8389','(710) 494-4928','Ap #466-7713 Pede. Ave','Belo Horizonte','Minas Gerais',94),('05-22-1970','1-909-428-4133','(934) 915-6324','Ap #229-1847 Enim, Avenue','Mauá','SP',95),('07-27-1973','1-278-591-8871','(430) 431-3158','4625 Malesuada Street','Santarém','PA',96),('09-16-1993','1-181-442-4852','(724) 965-1276','745-8311 Lacus Road','Castanhal','Pará',97),('02-26-1986','1-244-622-1969','(339) 596-1849','445-4333 Ligula. St.','Jundiaí','São Paulo',98),('01-24-1984','1-422-819-1195','(635) 494-9251','925-1999 Nulla. Street','Osasco','São Paulo',99),('02-04-1973','1-522-579-9906','(194) 419-7480','636-4234 Ut Avenue','Niterói','RJ',100);

INSERT INTO "genero" (nome, descricao) VALUES (
'Indie rock','Indie rock (ou "rock independente" em português) é um gênero musical surgido no Reino Unido e Estados Unidos durante a década de 1980. É enraizado em gêneros mais antigos, como o rock alternativo, o pós-punk e a new wave. O termo é frequentemente utilizado para descrever os meios de produção e distribuição de música underground independente e dissociada de grandes gravadoras, assim como o estilo musical a utilizar originalmente este meio de produção.'),
('J-Rock','Japanese rock (日本のロック, nihon no rokku?), algumas vezes abreviado como J-rock (ジェイ・ロック, Jei Rokku?) [1] é o nome dado ao rock feito no Japão. Influenciado pelo rock americano e britânico na década de 1960, as primeiras bandas de rock no Japão realizaram o que se chama Grupo Sounds, com letras quase exclusivamente em inglês. A banda de rock popular Happy End no início da década de 1970 é creditada como a primeira a cantar rock na língua japonesa. A banda de punk rock The Blue Hearts e o grupo de heavy metal X Japan, lideraram bandas de rock japonesas no final da década de 1980 e início da década de 1990 ao alcançar o maior sucesso mainstream.[2] O rock japonês tornou-se um sucesso em todo o mundo, sendo amplamente conhecida na Ásia e sobreviveu através de décadas competindo com o estilo contemporâneo derivado J-pop.'),
('Pop rock','Pop rock é um estilo de rock com uma abordagem mais leve e suave que é mais semelhante à música pop mainstream. Originário da década de 1950 como uma alternativa ao rock and roll, o pop rock no início foi influenciado pela batida, arranjos e estilo do rock and roll (e às vezes do doo-wop).'),
('Post-rock','O post-rock ou pós-rock é uma forma de rock experimental caracterizada pela influência e uso de instrumentos comumente associados ao rock, mas utilizando ritmos e guitarras como "facilitadores de timbre e texturas" que não se encontram tradicionalmente no rock. As bandas de post-rock são em maioria instrumentais.'),
('Post-punk','Pós-punk ou post-punk, é um gênero musical surgido na Inglaterra após o auge do punk-rock em 1977, mantendo as raízes do movimento punk, porém, de modo mais introspectivo, minimalista e experimental.'),
('Punk Rock','Punk rock é um movimento musical e cultural que surgiu em meados da década de 1970 e que tem como características principais músicas rápidas e ruidosas, com canções que abordem ideias políticas anarquistas, niilistas e revolucionárias.'),
('Hard Rock','Hard rock é um estilo musical, subgênero do rock que tem suas raízes do rock de garagem e psicodélico do meio da década de 1960, que se caracteriza por ser consideravelmente mais pesado do que a música rock convencional, e marcada pelo uso de distorção, uma seção rítmica proeminente, arranjos simples e um som potente, com riffs de guitarra pesada e solos.'),
('Heavy metal','Heavy metal (ou simplesmente metal) é um gênero do rock[2] que se desenvolveu no final da década de 1960 e no início da década de 1970, em grande parte no Reino Unido e nos Estados Unidos.[3] Tendo como raízes o blues-rock e o rock psicodélico (psicadélico, em português europeu), as bandas que criaram o heavy metal desenvolveram um som massivo e encorpado, caracterizado por um timbre saturado e distorcido dos amplificadores, pelas cordas graves da guitarra para a criação de riffs e pela exploração de sonoridades em tons menores, dando um ar sombrio às composições.'),
('Glam Rock','Glam rock (abreviação de glamour rock) é um gênero musical (subgênero do rock) criado na Inglaterra , conhecido também como glitter rock. Foi um estilo de música nascido no final dos anos 60 e popularizado no início dos anos 70. Era principalmente um fenômeno inglês que foi difundido em meados de 1971 e 1973. Nos EUA, o Glam rock teve um menor impacto e foi apenas difundido por fãs de música nas cidades de Nova Iorque e Los Angeles.'),
('Rock and roll','O rock and roll, conhecido também como rock n roll, é um estilo musical que surgiu nos Estados Unidos no final dos anos 1940 e início dos anos 1950,[1][2] com raízes nos estilos musicais norte-americanos, como: country, blues, R&B e gospel, e que rapidamente se espalhou para o resto do mundo.');

INSERT INTO "genero" (nome, descricao) VALUES 
('Alternative Rock','Rock alternativo (também conhecido como alt-rock, música alternativa ou simplesmente alternativo) é um gênero de rock surgido na década de 1980 que se tornou bastante popular na década de 1990.[1] Consiste de vários subgêneros oriundos da cena musical independente como grunge e britpop, que estão relacionados por sua influência em diversas escalas com o punk rock e que não se encaixavam em classificação alguma conhecida na época. Às vezes era usado para rotular artistas undergrounds dos anos 80 e bandas de rock and roll dos anos 90. Mais especificamente, englobava a maioria dos gêneros que surgiram nos anos 80 e que tornaram-se conhecidos nos anos 90, como o guitar, pós-punk, rock gótico e college rock. Apesar do gênero ter a estrutura de rock, muitas bandas são influenciadas pela música de seus respectivos países, sendo a influência de folk, reggae, eletrônico e jazz facilmente encontrada. Portanto, duas bandas de rock alternativo não têm necessariamente o mesmo ritmo, sendo o termo usado para qualquer rock que se aproxime do rock clássico, mas que, não se encaixou em nenhuma de suas vertentes.'),
('Grunge','Grunge (às vezes chamado de Seattle Sound ou Som de Seattle) é um subgênero do rock alternativo que surgiu no final da década de 1980 no estado americano de Washington, principalmente em Seattle, inspirado pelo hardcore punk, pelo heavy metal e pelo indie rock. As letras das bandas nomeadas grunge geralmente caracterizam-se por altas doses de angústia e sarcasmo, entrando em temas como alienação social, apatia, confinamento e desejo de liberdade. A estética grunge é despojada em comparação a outras formas de rock e muitos músicos grunge destacaram-se pela sua aparência desleixada e por rejeitarem a teatralidade em suas performances.'),
('Rock progressivo','Rock progressivo (também abreviado por prog rock ou prog) é um subgênero do rock que surgiu no fim da década de 1960, na Inglaterra. Tornou-se muito popular na década de 1970 e ainda hoje possui muitos adeptos. O estilo recebeu influências da música clássica e do jazz fusion, em contraste com o rock norte-americano, historicamente influenciado pelo rhythm and blues e pela música country. Ao longo dos anos apareceram muitos subgéneros deste estilo tais como o rock sinfônico, o space rock, o krautrock, o R.I.O, o metal progressivo e o metal sinfônico. Praticamente todos os países desenvolveram músicos ou agrupamentos musicais voltados a esse gênero.');

INSERT INTO "artista" (nome) VALUES ('Red Hot Chili Peppers'),('The Beatles'),('Muse'),('Coldplay'),('Nirvana'),('Radiohead'),('Foo Fighters'),('U2'),('Linkin Park'),('Led Zeppelin');

INSERT INTO "artista" (nome) VALUES ('Queen'),('Pink Floyd'),('The Killers'),('The White Stripes'),('The Rolling Stones'),('Green Day'),('Oasis'),('Guns N Roses'),('The Doors'),('System of a Down');

INSERT INTO "midia" (sigla, nome, descricao) VALUES 
('LP','Disco de Vinil','O disco de vinil, conhecido simplesmente como vinil ou ainda Long Play (LP), é uma mídia desenvolvida no final da década de 1940 para a reprodução musical, que usa um material plástico chamado vinil[1] (normalmente feito de PVC), usualmente de cor preta, que registra informações de áudio, que podem ser reproduzidas através de um toca-discos.'),
('K7','Fita cassete','A fita cassete ou compact cassette é um padrão de fita magnética para gravação de áudio lançado oficialmente em 1963, invenção da empresa holandesa Philips. Também é abreviado como K7.'),
('CD','Compact disc','Um disco compacto, disco compacto a laser, disco a laser, compacto laser ou simplesmente disco laser (popularmente conhecido por CD, sigla para a designação inglesa, Compact Disc) é um disco ótico digital de armazenamento de dados. O formato foi originalmente desenvolvido com o propósito de armazenar e tocar apenas músicas, mas posteriormente foi adaptado para o armazenamento de dados, o CD-ROM.'),
('DVD','Digital Video Disc','DVD, sigla de "Digital Video Disc" (em português, Disco Digital de Video) derivada da expressão inglesa "Digital Versatile Disc",[1] (em português, Disco Digital Versátil) é um formato digital para arquivar ou guardar dados, som e voz, tendo uma maior capacidade de armazenamento que o CD, devido a uma tecnologia óptica superior, além de padrões melhorados de compressão de dados, sendo criado no ano de 1995.'),
('STREAM','Streaming','A transmissão contínua,[1][2][3] também conhecida por fluxo de média (português europeu) ou fluxo de mídia (português brasileiro) (bem como pelo anglicismo streaming) é uma forma de distribuição digital, em oposição à descarga de dados.[4] A difusão de dados, geralmente em uma rede através de pacotes, é frequentemente utilizada para distribuir conteúdo multimídia através da Internet. Nesta forma, as informações não são armazenadas pelo usuário em seu próprio computador. Assim não é ocupado espaço no disco rígido (HD), para a posterior reprodução[5] — a não ser o arquivamento temporário no cache do sistema ou que o usuário ativamente faça a gravação dos dados. O fluxo dos dados é recebido e a mídia é reproduzida à medida que chega ao usuário, dependendo da largura de banda seja suficiente para reproduzir os conteúdos, se não for o suficiente ocorrerá interrupções na reprodução do arquivo, por problema no buffer.');

INSERT INTO "album" (nome, ano, capa) VALUES 
('At the Beeb',1989,'ADICIONAR'),
('A Night at the Opera',1975,'ADICIONAR'),
('Queen II',1974,'ADICIONAR'),
('Californication',1999,'ADICIONAR'),
('Abbey Road',1969,'ADICIONAR'),
('Absolution',2003,'ADICIONAR'),
('A Head Full of Dreams',2015,'ADICIONAR'),
('Nevermind',1991,'ADICIONAR'),
('The Dark Side of the Moon',1973,'ADICIONAR'),
('Hot Fuss',2004,'ADICIONAR');

INSERT INTO "faixa" (nome,posicao,duracao,cod_genero,cod_artista,cod_album) VALUES 
('FAIXA1',1,3.20,11,10,1),
('FAIXA2',1,3.1,11,10,1),
('FAIXA3',1,2.20,11,10,1),
('FAIXA4',1,4.0,11,10,1),
('FAIXA5',1,2.50,11,10,1),
('FAIXA6',1,4.20,11,10,1),
('FAIXA7',1,3.20,11,10,1),
('FAIXA8',1,3.20,11,10,1),
('FAIXA9',1,3.20,11,10,1),
('FAIXA10',1,3.20,11,10,1);

INSERT INTO "faixa" (nome,posicao,duracao,cod_genero,cod_artista,cod_album) VALUES 
('FAIXA1',1,3.20,11,10,2),
('FAIXA2',1,3.1,11,10,2),
('FAIXA3',1,2.20,11,10,2),
('FAIXA4',1,4.0,11,10,2),
('FAIXA5',1,2.50,11,10,2),
('FAIXA6',1,4.20,11,10,2),
('FAIXA7',1,3.20,11,10,2),
('FAIXA8',1,3.20,11,10,2),
('FAIXA9',1,3.20,11,10,2),
('FAIXA10',1,3.20,11,10,2);


INSERT INTO "produto" (nome,cod_album,cod_midia,preco,qtd_estoque) VALUES
('CD Queen - At the Beep',1,3,19.99,10),
('K7 Queen - At the Beep',1,2,15.99,8),
('DVD Pink Floyd - The Dark Side of the Moon',9,4,29.99,14),
('LP Pink Floyd - The Dark Side of the Moon',9,1,49.99,3),
('CD Red Hot Chilli Peppers - Californication',4,3,19.99,22);

SELECT produto.id,produto.nome AS nome, midia.sigla AS midia,artista.nome AS artista,album.nome AS album,genero.nome AS genero,produto.preco AS preco,produto.qtd_estoque FROM produto 
INNER JOIN album ON produto.cod_album = album.id
INNER JOIN midia ON produto.cod_midia = midia.id
INNER JOIN artista ON album.cod_artista = artista.id
INNER JOIN genero ON album.cod_genero = genero.id
WHERE produto.qtd_estoque > 0;