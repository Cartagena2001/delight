	create table Tb_Administradores(
	Id_Administrador serial primary key,
	Usuario varchar(25),
	Nombre varchar(50),
	Correo varchar(60),
	Telefono numeric(8),
	clave varchar(100),	
	estado_admin varchar(10) default 'Activo' check (estado_admin in ('Activo','Inactivo'))
   	)	

	create table Tb_Cliente(
	Id_cliente serial primary key,
	Usuario varchar(15),
	Nombre varchar(50),
	direccion varchar(100),
	Correo varchar(60),
	Telefono varchar(8),
	clave varchar(100),
	estado_cliente  varchar(10) default 'Activo' check (estado_cliente in ('Activo', 'Inactivo'))
	)
 	
	create table Tb_Cupones(
	Id_cupon serial primary key,
	puntos numeric(10) check (puntos >0),
	opcion varchar(25)
	) 
	

	create table Tb_categoria(
	Id_categoria serial primary key,
	nombre varchar(25),
	descripcion varchar(100),
	imagen varchar(50)
	)

	create table Tb_Productos(
	Id_producto serial primary key,
	nombre_p varchar(50),
	Precio numeric(5,2) check(Precio >0),
	Descripcion varchar(100),
	Imagen varchar(50),
	Id_categoria int references Tb_categoria(Id_categoria),
	estado varchar(100) default  'En existencias' check (estado in('En existencias', 'Agotado'))
	
	)

	create table Tb_Detelle_Pedido(
	Id_detalle_pedido serial primary key,
	Id_producto int references Tb_Productos(Id_Producto),
	Precio numeric(5,2) check (Precio >0),
	cantidad numeric(5) check (cantidad >0)
	)


	create table Tb_Pedidos(
	Id_pedido serial primary key,
	Id_cliente int references Tb_Cliente(Id_cliente),
	Id_cupon int references Tb_cupones (Id_cupon),
	Id_detalle_pedido int references Tb_Detelle_Pedido(Id_detalle_pedido),
	Costo_envio numeric(5,2) check(Costo_envio >0),
	Fecha_pedido date,
	Fecha_entrega date
	)
	

	create table Tb_Resenia(
	Id_resenia serial primary key,
	Calificacion int,
	Comentario varchar(100),
	Id_detalle_pedido int references Tb_Detelle_Pedido(Id_detalle_pedido)
	)
	create table TB_noticias(
	Id_noticia bigserial Primary key,
	titulo varchar(50),
	Descripcion varchar(300),
	imagen varchar(50),
	fecha_pub date
	);

	create table TB_contactenos(
	Id_contacto bigserial Primary key,
	Titulo_asunto varchar(50),
	Asunto varchar(200),
	Id_cliente int references Tb_Cliente(Id_cliente)
	);
	
	select * from  Tb_Administradores
	select * from Tb_Cupones
	select * from Tb_categoria
	select * from Tb_Productos
	select * from tb_detelle_Pedido
	select * from Tb_Pedidos
	select * from Tb_Resenia
	select * from Tb_noticias
	select * from Tb_contactenos 
	
	alter table 
-----------------------------------------------------------------------------------------------------------
	/* INSERT */
	--Prueba de insert asuando bigserial o bigint
	insert into Tb_Cupones (puntos, opcion)
	values (1.5, 'Producto gratis'),
	 		(2, 'Bolsa sorpresa')
	select * from Tb_cupones
	
	--Insert
	select * from tb_cupones

	select * from Tb_Pedidos
	insert into tb_pedidos(id_cliente, id_detalle_pedido, costo_envio, fecha_pedido, fecha_entrega)
	values	( 1,1, 3.40, '2020/02/15', '2020/02/20'),
			( 1,2, 3.40, '2020/02/16', '2020/02/20')


	select * from tb_detelle_Pedido
	insert into tb_detelle_Pedido (id_producto, precio, cantidad)
	values	(1, 1.30, 4),
			(2, 1.10, 2)


	insert into Tb_Administradores(Usuario, Nombre, Correo, Telefono, clave)
	values	('Gabys', ' Gabriela Sofia Ramirez', 'Gaby2011@gmail.com', 77617755, 'chamaco12'),
			('Keveen', ' Keveen Josue Reyes', 'Keveen3111@gmail.com', 77734897, 'serial3'),
			('Aldo', 'Adolfo Aldrete Vargas', 'A1do@gmail.com', 76237405, 'aldre1e'),
			('ErMP', ' Ernesto Melgar Perez', '8ere3@gmail.com', 65735897, 'dr.perez'),
			('Fatima', ' Villeda Cruz', 'LaVilleda@gmail.com', 67984852, 'arcoiris')
			
			select * from Tb_Administradores


	insert into Tb_Cliente(Usuario, Nombre, direccion, Correo, Telefono, clave)
	values	('Monik', ' Monica Ely Martinez', 'Km 26 1/2 Carretera a Santa Ana (Parque Industrial Intercomplex) Contiguo residencial Pasatiempo', 'MONIK19@gmail.com', 77349055, 'garfield39'),
			('Cezraz', ' Cesar Alfonso Ramirez', 'Col San Francisco Las Mercedes Cl Los Granados No 37', 'CezrazA11@gmail.com', 77256807, 'Finnhda'),
			('sALBY', ' Salvador Villanueva Alvares', '79 Av. Sur #9 Colonia La Mascota', 'Salbylover@gmail.com', 61617915, 'pelicomic'),
			('Rosalia', ' Rosalia Hernandez Martinez', 'Av Independencia Nte No 11', 'larosalia@hotmail.com', 79934345, 'rosaliaaa3'),
			('Tusa', ' Carolina Navarro Giraldo', 'Col Costa Rica Cl Limón No 203', 'ToroxNara3111@gmail.com', 66737797, 'chiraldo44'),
			('DED', ' Victor Paul Calderon', '4 Av Sur No 606', 'Victor@hotmail.com', 65311145, '10elded10'),
			('Juan', ' Juan Sebastian Guarnizo', 'Col Escalón 81 Av Sur No 301', 'Guarnizo29@gmail.com', 77256807, 'gameplays'),
			('Londra', ' Paulo Ezequiel Londra', 'Boulevar Universitario No.2200 Col. San José, S.S.', 'Londra@gmail.com', 79917756, 'bigligas'),
			('Oscu', 'Oriana Pilar Kane', '6 Av No 3-22 Z-10 Edif C C Médico II 5o Nvl Clínica 508 Ciudad de Guatemala', 'Osculord@gmail.com', 67738898, 'no_dijeron_nada'),
			('Arturito', ' Arturo Ramiro Amaya', 'Bo Distrito Comercial Central 3 Cl Pte No 124', 'rtur1to@ghotmail.com', 76700897, 'housepapel'),
			('Ali', ' Enrique Garcia Altamira', 'Cl Ruta Militar Fnl 3 Av Nte No 1019', 'Altamira9@gmail.com', 66399050, 'newworld'),
			('Mundo', ' Marcial Navarro Alvarez', 'Col. Montecristo Cl Antigua A Huizucar Y Cl', 'Mund0@hotmail.com', 67266800, 'Marcianoxd'),
			('Felipe', ' Alvares Medallin', 'Colonia Miramonte Cl Colima Políg Q No 23', 'Medallin@gmail.com', 76517895, 'ninjamedallin'),
			('Aurora', ' Aurora Tompson', 'Col Escalón 81 Av Sur No 305', '4ur0r4@gmail.com', 77745697, 'labelladumiente'),
			('Auron', ' Raul Alvares Genes', '79 Av Nte No 404 col Escalón', 'Auronplay@gmail.com', 75708092, 'inexpucnable'),
		    ('kath','katherine michelle gavidia', 'Col Escalón 81 Av Sur No 302', 'kathmichell@gmail.com',52558936,'katherineM')
			select * from Tb_Cliente

	insert into Tb_categoria (Nombre, Descripcion, imagen)
	values 	('Comida', 'alimentos varios', 'img'),
			('Tecnologia','diversos productos', 'img'),
			('Amor', 'afectos', 'img'),
			('Navidad', 'articulos navideños', 'img'),
			('Hallowen', 'obsequios de susto', 'img')
			select * from Tb_categoria
			
	insert into Tb_Productos (nombre_p, Precio, Descripcion, Imagen,Id_categoria)
	values 	('llavero de banana', 0.75, 'Combina con todo conjunto', 'imagen',1),
			('Llavero de sandia', 0.80, 'Refresca tu mente', 'imagen',1),
			('Llavero de fresa', 0.70, 'Adorable con tu estilo', 'imagen',1),
			('Llavero de manzana', 0.75, 'Una buena eleccion', 'imagen',1),	
			('Llavero de tomate', 0.75, 'SAludable para ti', 'imagen',1),	
			('Llavero de corazon rosa', 0.80, 'El amor es lo primero', 'imagen',3),		
			('Set bolas chinas', 1.00, 'Para todo momento', 'imagen',2),
			('Almohada de llaves', 0.95, 'Encuentra la salida', 'imagen',2),
			('Almohada en forma de camisa', 0.90, 'Identificate con nosotros', 'imagen',2),	
			('Cara antiestres', 0.80, 'RElajate con nuestro producto de goma', 'imagen',2),	
			('Almohada de corazon rojo', 1.00, 'Demuestra tu amor', 'imagen',3),	
			('Burbuja antiestres', 0.90, 'Combina con todo conjunto', 'imagen',2),	
			('Labios antiestres', 0.95, 'Combina con todo conjunto', 'imagen',3),
			('Papa Noel', 1.00,'El mejor regalo en espuma', 'imagen',4),
			('Almohada de reno', 0.85, 'Un presente ineesperado', 'imagen',4),	
			('Llavero de araña', 0.95, 'Combina con todo conjunto', 'imagen',5),	
			('Almohada con forma de murcielago', 0.75, 'Duerme en paz...att:Coronavirus', 'imagen',5),
			('Llavero de calabaza con cara', 0.80, 'Combina con todo conjunto', 'imagen',4),
			('Calabera de espuma florecente', 0.90, 'Sustos que dan gusto', 'imagen',5)	
		select * from Tb_Productos
		

	
	select * from Tb_Resenia
	insert into Tb_Resenia(Calificacion, Comentario, Id_detalle_pedido)
	values ('10',' Ofrece una gama amplia de posibilidades para todos los gusto',1),
		('8', ' Este será, sin duda alguna, uno de los productos más llamativos para estos meses',1),
		('9', ' En conclusión, este excelente producto es totalmente recomendable.',1),
		('7','Un vasto panorama de tranquilidad',1)