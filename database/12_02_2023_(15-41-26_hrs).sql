SET FOREIGN_KEY_CHECKS=0;
SET @usuario_id=1;

SET CHARACTER SET utf8; 
TRUNCATE TABLE abono_movimiento;



TRUNCATE TABLE abonos;



TRUNCATE TABLE bitacora;
INSERT INTO bitacora VALUES("49","2022-10-04","Registro de nueva categoria : \"viveres\"","Categoria Productos","1");
INSERT INTO bitacora VALUES("50","2022-10-04","Registro de nueva categoria : \"charcuteria\"","Categoria Productos","1");
INSERT INTO bitacora VALUES("51","2022-10-04","Registro de nueva categoria : \"limpieza\"","Categoria Productos","1");
INSERT INTO bitacora VALUES("52","2022-10-04","Registro de nueva categoria : \"Verduras\"","Categoria Productos","1");
INSERT INTO bitacora VALUES("53","2022-10-04","Registro de nueva categoria : \"frutas\"","Categoria Productos","1");
INSERT INTO bitacora VALUES("54","2022-10-04","Registro de nueva categoria : \"charcuteria\"","Categoria Productos","1");
INSERT INTO bitacora VALUES("55","2022-10-04","Registro de nueva categoria : \"confiteria\"","Categoria Productos","1");
INSERT INTO bitacora VALUES("56","2022-10-04","Registro de nueva categoria : \"bebidas\"","Categoria Productos","1");
INSERT INTO bitacora VALUES("57","2022-10-04","Registro de nueva categoria : \"electronica\"","Categoria Productos","1");
INSERT INTO bitacora VALUES("58","2022-10-04","Registro de nueva categoria : \"PESCADO\"","Categoria Productos","1");
INSERT INTO bitacora VALUES("59","2022-10-04","Registro de nueva categoria : \"jugueteria\"","Categoria Productos","1");
INSERT INTO bitacora VALUES("60","2022-10-04","Registro de nueva categoria : \"CARNES\"","Categoria Productos","1");
INSERT INTO bitacora VALUES("61","2022-10-04","Registro de nueva categoria : \"POLLO\"","Categoria Productos","1");
INSERT INTO bitacora VALUES("62","2022-10-04","Registro de nueva categoria : \"helados\"","Categoria Productos","1");
INSERT INTO bitacora VALUES("63","2022-10-04","Registro de nueva categoria : \"sdfsdf\"","Categoria Productos","1");
INSERT INTO bitacora VALUES("64","2022-10-04","Registro de nueva categoria : \"sdfsf\"","Categoria Productos","1");
INSERT INTO bitacora VALUES("65","2022-10-04","Registro de nueva categoria : \"sdfsdf\"","Categoria Productos","1");
INSERT INTO bitacora VALUES("66","2022-10-04","Registro de nueva categoria : \"sdfwe\"","Categoria Productos","1");
INSERT INTO bitacora VALUES("67","2022-10-04","Registro de nueva categoria : \"sdfsdgf\"","Categoria Productos","1");
INSERT INTO bitacora VALUES("68","2022-10-04","Registro de nueva categoria : \"jhbjh\"","Categoria Productos","1");
INSERT INTO bitacora VALUES("69","2022-10-04","Registro de nueva categoria : \"sdfsf\"","Categoria Productos","1");
INSERT INTO bitacora VALUES("70","2022-10-04","Registro de nueva categoria : \"sdfsf\"","Categoria Productos","1");
INSERT INTO bitacora VALUES("71","2022-10-04","Registro de nueva categoria : \"sdfsf\"","Categoria Productos","1");
INSERT INTO bitacora VALUES("72","2022-10-04","Registro de nueva categoria : \"sdfsf\"","Categoria Productos","1");
INSERT INTO bitacora VALUES("73","2022-10-04","Registro de nueva categoria : \"sdfsf\"","Categoria Productos","1");
INSERT INTO bitacora VALUES("74","2022-10-04","Registro de nueva categoria : \"sdfsf\"","Categoria Productos","1");
INSERT INTO bitacora VALUES("75","2022-10-04","Registro de nueva categoria : \"sdfsf\"","Categoria Productos","1");
INSERT INTO bitacora VALUES("76","2022-10-04","Registro de nueva categoria : \"sdfsf\"","Categoria Productos","1");
INSERT INTO bitacora VALUES("77","2022-10-04","Registro de nuevo movimiento en el balance por: \"VENTA\" por \"28.00\" y fue \"PAGADA\"","Balance","1");
INSERT INTO bitacora VALUES("78","2022-10-04","Registro de nuevo movimiento en el balance por: \"VENTA\" por \"59.00\" y fue \"PAGADA\"","Balance","1");
INSERT INTO bitacora VALUES("79","2022-10-04","Registro de nuevo movimiento en el balance por: \"VENTA\" por \"28.00\" y fue \"PAGADA\"","Balance","1");
INSERT INTO bitacora VALUES("80","2022-10-04","Registro de nuevo movimiento en el balance por: \"VENTA\" por \"15.00\" y fue \"PAGADA\"","Balance","1");
INSERT INTO bitacora VALUES("81","2022-10-04","Registro de nuevo movimiento en el balance por: \"COMPRA DE PRODUCTOS E INSUMOS\" por \"12.00\" y fue \"P","Balance","1");
INSERT INTO bitacora VALUES("82","2022-10-04","Registro de nuevo movimiento en el balance por: \"NÓMINA\" por \"13.00\" y fue \"PAGADA\"","Balance","1");
INSERT INTO bitacora VALUES("83","2022-10-04","Registro de nuevo movimiento en el balance por: \"NÓMINA\" por \"1.00\" y fue \"PAGADA\"","Balance","1");
INSERT INTO bitacora VALUES("84","2022-10-04","Registro de nuevo movimiento en el balance por: \"ARRIENDO\" por \"12.00\" y fue \"PAGADA\"","Balance","1");
INSERT INTO bitacora VALUES("85","2022-10-04","Registro de nuevo movimiento en el balance por: \"COMPRA DE PRODUCTOS E INSUMOS\" por \"1.00\" y fue \"PA","Balance","1");
INSERT INTO bitacora VALUES("86","2022-10-04","Registro de nuevo movimiento en el balance por: \"COMPRA DE PRODUCTOS E INSUMOS\" por \"4.00\" y fue \"A ","Balance","1");
INSERT INTO bitacora VALUES("87","2022-10-04","Registro de nuevo movimiento en el balance por: \"COMPRA DE PRODUCTOS E INSUMOS\" por \"12.00\" y fue \"P","Balance","1");
INSERT INTO bitacora VALUES("88","2022-10-04","Registro de nuevo movimiento en el balance por: \"COMPRA DE PRODUCTOS E INSUMOS\" por \"1.00\" y fue \"PA","Balance","1");
INSERT INTO bitacora VALUES("89","2022-10-04","Registro de nuevo movimiento en el balance por: \"COMPRA DE PRODUCTOS E INSUMOS\" por \"3.00\" y fue \"PA","Balance","1");
INSERT INTO bitacora VALUES("90","2022-10-04","Registro de nuevo movimiento en el balance por: \"SERVICIOS PÚBLICOS\" por \"5.00\" y fue \"PAGADA\"","Balance","1");
INSERT INTO bitacora VALUES("91","2022-10-04","Registro de nuevo movimiento en el balance por: \"COMPRA DE PRODUCTOS E INSUMOS\" por \"23.00\" y fue \"P","Balance","1");
INSERT INTO bitacora VALUES("92","2022-10-04","Registro de nuevo movimiento en el balance por: \"COMPRA DE PRODUCTOS E INSUMOS\" por \"3.00\" y fue \"PA","Balance","1");
INSERT INTO bitacora VALUES("93","2022-10-04","Registro de nuevo movimiento en el balance por: \"COMPRA DE PRODUCTOS E INSUMOS\" por \"2.00\" y fue \"PA","Balance","1");
INSERT INTO bitacora VALUES("94","2022-10-04","Registro de nuevo movimiento en el balance por: \"COMPRA DE PRODUCTOS E INSUMOS\" por \"2.00\" y fue \"PA","Balance","1");
INSERT INTO bitacora VALUES("95","2022-10-04","Registro de nuevo movimiento en el balance por: \"COMPRA DE PRODUCTOS E INSUMOS\" por \"2.00\" y fue \"PA","Balance","1");
INSERT INTO bitacora VALUES("96","2022-10-04","Registro de nuevo movimiento en el balance por: \"COMPRA DE PRODUCTOS E INSUMOS\" por \"12.00\" y fue \"P","Balance","1");
INSERT INTO bitacora VALUES("97","2022-10-04","Registro de nuevo movimiento en el balance por: \"VENTA\" por \"71.30\" y fue \"pagada\"","Balance","1");
INSERT INTO bitacora VALUES("98","2022-10-04","Registro de nuevo movimiento en el balance por: \"VENTA\" por \"100.00\" y fue \"pagada\"","Balance","1");
INSERT INTO bitacora VALUES("99","2022-10-04","Registro de nuevo movimiento en el balance por: \"VENTA\" por \"100.00\" y fue \"pagada\"","Balance","1");
INSERT INTO bitacora VALUES("100","2022-10-04","Registro de nuevo movimiento en el balance por: \"VENTA\" por \"50.00\" y fue \"PAGADA\"","Balance","1");
INSERT INTO bitacora VALUES("101","2022-10-04","Registro de nuevo movimiento en el balance por: \"VENTA\" por \"50.00\" y fue \"PAGADA\"","Balance","1");
INSERT INTO bitacora VALUES("102","2022-10-04","Registro de nuevo movimiento en el balance por: \"COMPRA DE PRODUCTOS E INSUMOS\" por \"122.00\" y fue \"","Balance","1");
INSERT INTO bitacora VALUES("103","2022-10-04","Registro de nuevo movimiento en el balance por: \"SERVICIOS PÚBLICOS\" por \"10.00\" y fue \"A CREDITO\"","Balance","1");
INSERT INTO bitacora VALUES("104","2022-10-04","Registro de nuevo movimiento en el balance por: \"VENTA\" por \"10.80\" y fue \"A CREDITO\"","Balance","1");
INSERT INTO bitacora VALUES("105","2022-10-04","Registro de nuevo movimiento en el balance por: \"VENTA\" por \"10.80\" y fue \"A CREDITO\"","Balance","1");
INSERT INTO bitacora VALUES("106","2022-10-04","Registro de nuevo movimiento en el balance por: \"VENTA\" por \"7.00\" y fue \"PAGADA\"","Balance","1");
INSERT INTO bitacora VALUES("107","2022-10-04","Registro de nuevo movimiento en el balance por: \"VENTA\" por \"7.00\" y fue \"PAGADA\"","Balance","1");
INSERT INTO bitacora VALUES("108","2022-10-04","Registro de nuevo movimiento en el balance por: \"VENTA\" por \"10.80\" y fue \"PAGADA\"","Balance","1");
INSERT INTO bitacora VALUES("109","2022-10-04","Registro de nuevo movimiento en el balance por: \"VENTA\" por \"10.80\" y fue \"PAGADO\"","Balance","1");
INSERT INTO bitacora VALUES("110","2022-10-04","Registro de nuevo movimiento en el balance por: \"VENTA\" por \"50.00\" y fue \"A CREDITO\"","Balance","1");
INSERT INTO bitacora VALUES("111","2022-10-04","Registro de nuevo movimiento en el balance por: \"VENTA\" por \"15.00\" y fue \"PAGADA\"","Balance","1");
INSERT INTO bitacora VALUES("112","2022-10-04","Registro de nuevo movimiento en el balance por: \"VENTA\" por \"10.80\" y fue \"PAGADO\"","Balance","1");
INSERT INTO bitacora VALUES("113","2022-10-04","Registro de nuevo movimiento en el balance por: \"VENTA\" por \"7.00\" y fue \"PAGADO\"","Balance","1");
INSERT INTO bitacora VALUES("114","2022-10-04","Registro de nuevo movimiento en el balance por: \"ARRIENDO\" por \"23.00\" y fue \"PAGADO\"","Balance","1");
INSERT INTO bitacora VALUES("115","2022-10-04","Registro de nuevo movimiento en el balance por: \"MERCADEO Y PUBLICIDAD\" por \"10.00\" y fue \"A CREDITO","Balance","1");
INSERT INTO bitacora VALUES("116","2022-10-04","Registro de nuevo movimiento en el balance por: \"COMPRA DE PRODUCTOS E INSUMOS\" por \"50.00\" y fue \"P","Balance","1");
INSERT INTO bitacora VALUES("117","2022-10-04","Registro de nuevo movimiento en el balance por: \"COMPRA DE PRODUCTOS E INSUMOS\" por \"50.00\" y fue \"P","Balance","1");
INSERT INTO bitacora VALUES("118","2022-10-04","Registro de nuevo movimiento en el balance por: \"VENTA\" por \"9.66\" y fue \"PAGADO\"","Balance","1");
INSERT INTO bitacora VALUES("119","2022-10-04","Registro de nuevo movimiento en el balance por: \"SERVICIOS PÚBLICOS\" por \"30.00\" y fue \"PAGADO\"","Balance","1");
INSERT INTO bitacora VALUES("120","2022-10-04","Registro de nuevo movimiento en el balance por: \"MUEBLES, EQUIPOS Y MAQUINARÍA\" por \"30.00\" y fue \"P","Balance","1");
INSERT INTO bitacora VALUES("121","2022-10-04","Registro de nuevo movimiento en el balance por: \"COMPRA DE PRODUCTOS E INSUMOS\" por \"6.00\" y fue \"PA","Balance","1");
INSERT INTO bitacora VALUES("122","2022-10-04","Registro de nuevo movimiento en el balance por: \"VENTA\" por \"6.20\" y fue \"A CREDITO\"","Balance","1");
INSERT INTO bitacora VALUES("123","2022-10-04","Registro de nuevo movimiento en el balance por: \"VENTA\" por \"8.00\" y fue \"PAGADO\"","Balance","1");
INSERT INTO bitacora VALUES("124","2022-10-04","Registro de nuevo movimiento en el balance por: \"NÓMINA\" por \"10.00\" y fue \"A CREDITO\"","Balance","1");
INSERT INTO bitacora VALUES("125","2022-10-04","Registro de nuevo movimiento en el balance por: \"SERVICIOS PÚBLICOS\" por \"23.00\" y fue \"A CREDITO\"","Balance","1");
INSERT INTO bitacora VALUES("126","2022-10-04","Registro de nuevo movimiento en el balance por: \"VENTA\" por \"9.20\" y fue \"PAGADA\"","Balance","1");
INSERT INTO bitacora VALUES("127","2022-10-04","Registro de nuevo movimiento en el balance por: \"VENTA\" por \"8.00\" y fue \"PAGADA\"","Balance","1");
INSERT INTO bitacora VALUES("128","2022-10-04","Registro de nuevo movimiento en el balance por: \"COMPRA DE PRODUCTOS E INSUMOS\" por \"6.00\" y fue \"PA","Balance","1");
INSERT INTO bitacora VALUES("129","2022-10-04","Registro de nuevo movimiento en el balance por: \"COMPRA DE PRODUCTOS E INSUMOS\" por \"23.00\" y fue \"A","Balance","1");
INSERT INTO bitacora VALUES("130","2022-10-04","Registro de nuevo movimiento en el balance por: \"SERVICIOS PÚBLICOS\" por \"23.00\" y fue \"A CREDITO\"","Balance","1");
INSERT INTO bitacora VALUES("131","2022-10-04","Nuevo Registro del : \"proveedor\" =>  \"DISTRIBUIDORA \"","Personas","1");
INSERT INTO bitacora VALUES("132","2022-10-04","Nuevo Registro del : \"proveedor\" =>  \"LOS PALAZUELOS\"","Personas","1");
INSERT INTO bitacora VALUES("133","2022-10-04","Nuevo Registro del : \"proveedor\" =>  \"SANTIAGO\"","Personas","1");
INSERT INTO bitacora VALUES("134","2022-10-04","Nuevo Registro del : \"proveedor\" =>  \"ARIANNA\"","Personas","1");
INSERT INTO bitacora VALUES("135","2022-10-04","Nuevo Registro del : \"proveedor\" =>  \"MARIANA\"","Personas","1");
INSERT INTO bitacora VALUES("136","2022-10-04","Nuevo Registro del : \"proveedor\" =>  \"JOSE\"","Personas","1");
INSERT INTO bitacora VALUES("137","2022-10-04","Nuevo Registro del : \"proveedor\" =>  \"MARIA\"","Personas","1");
INSERT INTO bitacora VALUES("138","2022-10-04","Nuevo Registro del : \"proveedor\" =>  \"ARIANNA\"","Personas","1");
INSERT INTO bitacora VALUES("139","2022-10-04","Nuevo Registro del : \"proveedor\" =>  \"mariana\"","Personas","1");
INSERT INTO bitacora VALUES("140","2022-10-04","Nuevo Registro del : \"cliente\" =>  \"JOSEF\"","Personas","1");
INSERT INTO bitacora VALUES("141","2022-10-04","Nuevo Registro del : \"cliente\" =>  \"JOSE DAZA\"","Personas","1");
INSERT INTO bitacora VALUES("142","2022-10-04","Nuevo Registro del : \"proveedor\" =>  \"JOSE FERNANDO\"","Personas","1");
INSERT INTO bitacora VALUES("143","2022-10-04","Nuevo Registro del : \"cliente\" =>  \"JUAN\"","Personas","1");
INSERT INTO bitacora VALUES("144","2022-10-04","Nuevo Registro del : \"cliente\" =>  \"ROSA\"","Personas","1");
INSERT INTO bitacora VALUES("145","2022-10-04","Nuevo Registro del : \"cliente\" =>  \"paola colmenarez\"","Personas","1");
INSERT INTO bitacora VALUES("146","2022-10-04","Registro de un nuevo Producto : \"harina\"","Productos","1");
INSERT INTO bitacora VALUES("147","2022-10-04","Registro de un nuevo Producto : \"arroz mary\"","Productos","1");
INSERT INTO bitacora VALUES("148","2022-10-04","Registro de un nuevo Producto : \"azucar montalban\"","Productos","1");
INSERT INTO bitacora VALUES("149","2022-10-04","Registro de un nuevo Producto : \"caraotas\"","Productos","1");
INSERT INTO bitacora VALUES("150","2022-10-04","Registro de un nuevo Producto : \"mortadela\"","Productos","1");
INSERT INTO bitacora VALUES("151","2022-10-04","Registro de un nuevo Producto : \"refresco\"","Productos","1");
INSERT INTO bitacora VALUES("152","2022-10-04","Registro de un nuevo Producto : \"queso\"","Productos","1");
INSERT INTO bitacora VALUES("153","2022-10-04","Registro de un nuevo Producto : \"harina de trigo\"","Productos","1");
INSERT INTO bitacora VALUES("154","2022-10-04","Registro de un nuevo Producto : \"mayonesa\"","Productos","1");
INSERT INTO bitacora VALUES("155","2022-10-04","Registro de un nuevo Producto : \"kepchut\"","Productos","1");
INSERT INTO bitacora VALUES("156","2022-10-04","Registro de un nuevo Producto : \"MEDUSA\"","Productos","1");
INSERT INTO bitacora VALUES("157","2022-10-04","Registro de un nuevo Producto : \"FAROS\"","Productos","1");
INSERT INTO bitacora VALUES("158","2022-10-04","Registro de un nuevo Producto : \"sadfsdf\"","Productos","1");
INSERT INTO bitacora VALUES("159","2022-10-04","Registro de un nuevo Producto : \"juhiu\"","Productos","1");
INSERT INTO bitacora VALUES("160","2022-10-04","Registro de un nuevo Producto : \"jhkjhkj\"","Productos","1");
INSERT INTO bitacora VALUES("161","2022-10-04","Registro de un nuevo Producto : \"asd\"","Productos","1");
INSERT INTO bitacora VALUES("162","2022-10-04","Registro de un nuevo Producto : \"wqeqwe\"","Productos","1");
INSERT INTO bitacora VALUES("163","2022-10-04","Registro de un nuevo Producto : \"frutas\"","Productos","1");
INSERT INTO bitacora VALUES("164","2022-10-04","Registro de un nuevo Producto : \"mantequilla\"","Productos","1");
INSERT INTO bitacora VALUES("165","2022-10-04","Registro de un nuevo Producto : \"computadora\"","Productos","1");
INSERT INTO bitacora VALUES("166","2022-10-04","Registro de un nuevo Producto : \"salsa\"","Productos","1");
INSERT INTO bitacora VALUES("167","2022-10-04","Registro de un nuevo Producto : \"aceite\"","Productos","1");
INSERT INTO bitacora VALUES("168","2022-10-04","Registro de un nuevo rol : \"vendedor\"","Roles","1");
INSERT INTO bitacora VALUES("169","2022-10-04","Registro de un nuevo rol : \"gerente\"","Roles","1");
INSERT INTO bitacora VALUES("170","2022-10-04","Registro de un nuevo rol : \"superusuario\"","Roles","1");
INSERT INTO bitacora VALUES("171","2022-10-04","Registro de un nuevo usuario : \"ariann\"","Usuarios","1");
INSERT INTO bitacora VALUES("172","2022-10-04","Registro de un nuevo usuario : \"PAOLSA\"","Usuarios","1");
INSERT INTO bitacora VALUES("173","2022-10-04","Registro de un nuevo usuario : \"arianna\"","Usuarios","1");
INSERT INTO bitacora VALUES("174","2022-10-04","Registro de un nuevo usuario : \"paola\"","Usuarios","1");
INSERT INTO bitacora VALUES("248","2022-10-10","El usuario : \"SUPERUSUARIO\" fue modificado","Usuarios","3");
INSERT INTO bitacora VALUES("249","2022-10-10","El usuario : \"SUPERUSUARIO\" fue modificado","Usuarios","3");
INSERT INTO bitacora VALUES("250","2022-10-10","El usuario : \"ARIANNA\" fue modificado","Usuarios","3");
INSERT INTO bitacora VALUES("251","2022-10-11","Registro de nuevo movimiento en el balance por: \"VENTA\" por \"15.75\" y fue \"PAGADA\"","Balance","1");
INSERT INTO bitacora VALUES("252","2022-10-11","EL producto: \"refresco\" fue modificado","Productos","1");
INSERT INTO bitacora VALUES("253","2022-10-11","EL producto: \"harina\" fue modificado","Productos","1");
INSERT INTO bitacora VALUES("254","2022-10-11","Registro de nuevo movimiento en el balance por: \"COMPRA DE PRODUCTOS E INSUMOS\" por \"6.00\" y fue \"PA","Balance","1");
INSERT INTO bitacora VALUES("255","2022-10-13","Nuevo Registro del : \"cliente\" =>  \"Orlando Guedez\"","Personas","1");
INSERT INTO bitacora VALUES("256","2022-10-13","Nuevo Registro del : \"cliente\" =>  \"Cristiano Ronaldo\"","Personas","1");
INSERT INTO bitacora VALUES("257","2022-10-13","Nuevo Registro del : \"proveedor\" =>  \"Leonel Messi\"","Personas","1");
INSERT INTO bitacora VALUES("258","2022-10-13","Nuevo Registro del : \"proveedor\" =>  \"Pablo Lopez\"","Personas","1");
INSERT INTO bitacora VALUES("259","2022-10-13","Registro de nueva categoria : \"Verduras\"","Categoria Productos","1");
INSERT INTO bitacora VALUES("260","2022-10-13","Registro de nueva categoria : \"viveres\"","Categoria Productos","1");
INSERT INTO bitacora VALUES("261","2022-10-13","Registro de nueva categoria : \"Carnes\"","Categoria Productos","1");
INSERT INTO bitacora VALUES("262","2022-10-13","Modificacion de la categoria : \"Viveres\"","Categoria Productos","1");
INSERT INTO bitacora VALUES("263","2022-10-13","Registro de nueva categoria : \"Viiveres\"","Categoria Productos","1");
INSERT INTO bitacora VALUES("264","2022-10-13","Modificacion de la categoria : \"Viveres\"","Categoria Productos","1");
INSERT INTO bitacora VALUES("265","2022-10-13","Modificacion de la categoria : \"Viveres\"","Categoria Productos","1");
INSERT INTO bitacora VALUES("266","2022-10-13","Registro de un nuevo Producto : \"Harina Pan\"","Productos","1");
INSERT INTO bitacora VALUES("267","2022-10-13","Registro de un nuevo Producto : \"Azucar Morena\"","Productos","1");
INSERT INTO bitacora VALUES("268","2022-10-13","Registro de un nuevo Producto : \"Aceite Coamo\"","Productos","1");
INSERT INTO bitacora VALUES("269","2022-10-13","EL producto: \"Aceite Coamo\" fue modificado","Productos","1");
INSERT INTO bitacora VALUES("270","2022-10-13","Registro de nuevo movimiento en el balance por: \"VENTA\" por \"19.00\" y fue \"PAGADA\"","Balance","1");
INSERT INTO bitacora VALUES("271","2022-10-13","EL producto: \"Harina Pan\" fue modificado","Productos","1");
INSERT INTO bitacora VALUES("272","2022-10-13","EL producto: \"Azucar Morena\" fue modificado","Productos","1");
INSERT INTO bitacora VALUES("273","2022-10-13","Registro de nuevo movimiento en el balance por: \"VENTA\" por \"15.00\" y fue \"A CREDITO\"","Balance","1");
INSERT INTO bitacora VALUES("274","2022-10-13","EL producto: \"Aceite Coamo\" fue modificado","Productos","1");
INSERT INTO bitacora VALUES("275","2022-10-13","Registro de nuevo movimiento en el balance por: \"TRANSPORTES, DOMICILIOS, LOGISTICA\" por \"20.00\" y f","Balance","1");
INSERT INTO bitacora VALUES("276","2022-10-13","Registro de nuevo movimiento en el balance por: \"COMPRA DE PRODUCTOS E INSUMOS\" por \"60.00\" y fue \"P","Balance","1");
INSERT INTO bitacora VALUES("277","2022-10-18","Registro de un nuevo Producto : \"HARINA\"","Productos","1");
INSERT INTO bitacora VALUES("278","2022-10-18","Registro de nuevo movimiento en el balance por: \"VENTA\" por \"9.20\" y fue \"PAGADA\"","Balance","1");
INSERT INTO bitacora VALUES("279","2022-10-18","Registro de nuevo movimiento en el balance por: \"VENTA\" por \"9.20\" y fue \"PAGADA\"","Balance","1");
INSERT INTO bitacora VALUES("280","2022-10-18","Registro de nuevo movimiento en el balance por: \"VENTA\" por \"9.20\" y fue \"PAGADA\"","Balance","1");
INSERT INTO bitacora VALUES("281","2022-10-18","Registro de nuevo movimiento en el balance por: \"VENTA\" por \"46.00\" y fue \"PAGADA\"","Balance","1");
INSERT INTO bitacora VALUES("282","2022-10-18","Registro de nuevo movimiento en el balance por: \"VENTA\" por \"55.20\" y fue \"PAGADA\"","Balance","1");
INSERT INTO bitacora VALUES("283","2022-10-18","Registro de nuevo movimiento en el balance por: \"VENTA\" por \"55.20\" y fue \"PAGADA\"","Balance","1");
INSERT INTO bitacora VALUES("284","2022-10-18","Registro de nuevo movimiento en el balance por: \"VENTA\" por \"55.20\" y fue \"PAGADA\"","Balance","1");
INSERT INTO bitacora VALUES("285","2022-10-18","Registro de nuevo movimiento en el balance por: \"VENTA\" por \"18.40\" y fue \"PAGADA\"","Balance","1");
INSERT INTO bitacora VALUES("286","2022-10-18","Registro de nuevo movimiento en el balance por: \"VENTA\" por \"9.20\" y fue \"PAGADA\"","Balance","1");
INSERT INTO bitacora VALUES("287","2022-10-18","Registro de nuevo movimiento en el balance por: \"VENTA\" por \"9.20\" y fue \"PAGADA\"","Balance","1");
INSERT INTO bitacora VALUES("288","2022-10-18","Modificacion de la categoria : \"Verdura\"","Categoria Productos","1");
INSERT INTO bitacora VALUES("289","2022-10-18","Registro de nueva categoria : \"limpieza\"","Categoria Productos","1");
INSERT INTO bitacora VALUES("290","2022-10-18","EL producto: \"HARINA\" fue modificado","Productos","1");
INSERT INTO bitacora VALUES("291","2022-10-19","Modificacion de la categoria : \"limpieza\"","Categoria Productos","1");
INSERT INTO bitacora VALUES("292","2022-10-19","Registro de un nuevo rol : \"encargado\"","Roles","1");
INSERT INTO bitacora VALUES("293","2022-10-19","El rol : \"encargado\" fue modificado","Roles","1");
INSERT INTO bitacora VALUES("294","2022-10-19","Registro de un nuevo rol : \"aASDasa\"","Roles","1");
INSERT INTO bitacora VALUES("295","2022-10-19","El rol : \"aASDasa\" fue modificado","Roles","1");
INSERT INTO bitacora VALUES("296","2022-10-19","Registro de un nuevo rol : \"werwer\"","Roles","1");
INSERT INTO bitacora VALUES("297","2022-10-19","El rol : \"werwer\" fue modificado","Roles","1");
INSERT INTO bitacora VALUES("298","2022-10-19","Registro de un nuevo rol : \"sdfsdf\"","Roles","1");
INSERT INTO bitacora VALUES("299","2022-10-19","El rol : \"sdfsdf\" fue modificado","Roles","1");
INSERT INTO bitacora VALUES("300","2022-10-19","Registro de un nuevo rol : \"eqwsadas\"","Roles","1");
INSERT INTO bitacora VALUES("301","2022-10-19","El rol : \"eqwsadas\" fue modificado","Roles","1");
INSERT INTO bitacora VALUES("302","2022-10-19","Registro de un nuevo Producto : \"huevos\"","Productos","1");
INSERT INTO bitacora VALUES("303","2022-10-19","Registro de un nuevo Producto : \"jugos \"","Productos","1");
INSERT INTO bitacora VALUES("304","2022-10-19","EL producto: \"jugo naranja\" fue modificado","Productos","1");
INSERT INTO bitacora VALUES("305","2022-10-19","EL producto: \"jugo naranja\" fue modificado","Productos","1");
INSERT INTO bitacora VALUES("306","2022-10-19","EL producto: \"jugo naranja\" fue modificado","Productos","1");
INSERT INTO bitacora VALUES("307","2022-10-19","Registro de un nuevo Producto : \"FAROS\"","Productos","1");
INSERT INTO bitacora VALUES("308","2022-10-19","EL producto: \"FAROS\" fue modificado","Productos","1");
INSERT INTO bitacora VALUES("309","2022-10-21","Registro de nuevo movimiento en el balance por: \"VENTA\" por \"9.20\" y fue \"A CREDITO\"","Balance","1");
INSERT INTO bitacora VALUES("310","2022-10-21","Registro de nuevo movimiento en el balance por: \"COMPRA DE PRODUCTOS E INSUMOS\" por \"5.00\" y fue \"PA","Balance","1");
INSERT INTO bitacora VALUES("311","2022-10-21","Registro de nuevo movimiento en el balance por: \"COMPRA DE PRODUCTOS E INSUMOS\" por \"5.00\" y fue \"A ","Balance","1");
INSERT INTO bitacora VALUES("312","2022-10-21","Registro de nuevo movimiento en el balance por: \"COMPRA DE PRODUCTOS E INSUMOS\" por \"5.00\" y fue \"A ","Balance","1");
INSERT INTO bitacora VALUES("313","2022-10-21","Registro de nuevo movimiento en el balance por: \"ARRIENDO\" por \"5.00\" y fue \"A CREDITO\"","Balance","1");
INSERT INTO bitacora VALUES("314","2022-10-21","Registro de nuevo movimiento en el balance por: \"COMPRA DE PRODUCTOS E INSUMOS\" por \"5.00\" y fue \"A ","Balance","1");
INSERT INTO bitacora VALUES("315","2022-10-21","Registro de nuevo movimiento en el balance por: \"COMPRA DE PRODUCTOS E INSUMOS\" por \"5.00\" y fue \"PA","Balance","1");
INSERT INTO bitacora VALUES("316","2022-10-21","Registro de nuevo movimiento en el balance por: \"COMPRA DE PRODUCTOS E INSUMOS\" por \"5.00\" y fue \"PA","Balance","1");
INSERT INTO bitacora VALUES("317","2022-10-21","Registro de nuevo movimiento en el balance por: \"COMPRA DE PRODUCTOS E INSUMOS\" por \"5.00\" y fue \"PA","Balance","1");
INSERT INTO bitacora VALUES("318","2022-10-23","Registro de nuevo movimiento en el balance por: \"VENTA\" por \"20.00\" y fue \"PAGADA\"","Balance","1");
INSERT INTO bitacora VALUES("319","2022-10-23","Registro de nuevo movimiento en el balance por: \"VENTA\" por \"120.00\" y fue \"PAGADA\"","Balance","1");
INSERT INTO bitacora VALUES("320","2022-10-23","Registro de nuevo movimiento en el balance por: \"VENTA\" por \"140.00\" y fue \"PAGADA\"","Balance","1");
INSERT INTO bitacora VALUES("321","2022-10-23","Registro de nuevo movimiento en el balance por: \"VENTA\" por \"10.00\" y fue \"PAGADA\"","Balance","1");
INSERT INTO bitacora VALUES("322","2022-10-24","Registro de nuevo movimiento en el balance por: \"VENTA\" por \"10.50\" y fue \"PAGADA\"","Balance","1");
INSERT INTO bitacora VALUES("323","2022-10-25","Registro de nuevo movimiento en el balance por: \"COMPRA DE PRODUCTOS E INSUMOS\" por \"72.00\" y fue \"P","Balance","1");
INSERT INTO bitacora VALUES("324","2022-10-25","Registro de nuevo movimiento en el balance por: \"COMPRA DE PRODUCTOS E INSUMOS\" por \"1.00\" y fue \"PA","Balance","1");
INSERT INTO bitacora VALUES("325","2022-10-25","Registro de nuevo movimiento en el balance por: \"ARRIENDO\" por \"5.00\" y fue \"A CREDITO\"","Balance","1");
INSERT INTO bitacora VALUES("326","2022-10-25","Registro de nuevo movimiento en el balance por: \"COMPRA DE PRODUCTOS E INSUMOS\" por \"0.00\" y fue \"PA","Balance","1");
INSERT INTO bitacora VALUES("327","2022-10-25","Registro de nuevo movimiento en el balance por: \"COMPRA DE PRODUCTOS E INSUMOS\" por \"0.00\" y fue \"PA","Balance","1");
INSERT INTO bitacora VALUES("328","2022-10-25","Registro de nuevo movimiento en el balance por: \"COMPRA DE PRODUCTOS E INSUMOS\" por \"144.00\" y fue \"","Balance","1");
INSERT INTO bitacora VALUES("329","2022-10-25","Registro de nuevo movimiento en el balance por: \"COMPRA DE PRODUCTOS E INSUMOS\" por \"12.00\" y fue \"P","Balance","1");
INSERT INTO bitacora VALUES("330","2022-10-26","Registro de un nuevo rol : \"encargado\"","Roles","1");



TRUNCATE TABLE cat_producto;
INSERT INTO cat_producto VALUES("32","Verdura","1");
INSERT INTO cat_producto VALUES("33","Viveres","1");
INSERT INTO cat_producto VALUES("34","Carnes","1");
INSERT INTO cat_producto VALUES("35","Viveres","0");
INSERT INTO cat_producto VALUES("36","limpieza","0");



TRUNCATE TABLE clientes;
INSERT INTO clientes VALUES("1","daniela","27629581","CI","04147483641","1");



TRUNCATE TABLE concepto_movimiento;
INSERT INTO concepto_movimiento VALUES("1","VENTA","1");
INSERT INTO concepto_movimiento VALUES("2","SERVICIOS PÚBLICOS","1");
INSERT INTO concepto_movimiento VALUES("3","COMPRA DE PRODUCTOS E INSUMOS","1");
INSERT INTO concepto_movimiento VALUES("4","ARRIENDO","1");
INSERT INTO concepto_movimiento VALUES("5","NÓMINA","1");
INSERT INTO concepto_movimiento VALUES("6","GASTOS ADMINISTRATIVOS","1");
INSERT INTO concepto_movimiento VALUES("7","MERCADEO Y PUBLICIDAD","1");
INSERT INTO concepto_movimiento VALUES("8","TRANSPORTES, DOMICILIOS, LOGISTICA","1");
INSERT INTO concepto_movimiento VALUES("9","MANTENIMIENTO Y REPARACIONES","1");
INSERT INTO concepto_movimiento VALUES("10","MUEBLES, EQUIPOS Y MAQUINARÍA","1");
INSERT INTO concepto_movimiento VALUES("11","OTROS","1");



TRUNCATE TABLE detalles_movimientos;
INSERT INTO detalles_movimientos VALUES("51","9.20","1","1","94","29");
INSERT INTO detalles_movimientos VALUES("52","9.20","1","1","95","29");
INSERT INTO detalles_movimientos VALUES("53","9.20","1","1","96","29");
INSERT INTO detalles_movimientos VALUES("54","9.20","5","1","97","29");
INSERT INTO detalles_movimientos VALUES("55","9.20","6","1","98","29");
INSERT INTO detalles_movimientos VALUES("56","9.20","6","1","99","29");
INSERT INTO detalles_movimientos VALUES("57","9.20","6","1","100","29");
INSERT INTO detalles_movimientos VALUES("58","9.20","2","1","101","29");
INSERT INTO detalles_movimientos VALUES("59","9.20","1","1","102","29");
INSERT INTO detalles_movimientos VALUES("60","9.20","1","1","103","29");
INSERT INTO detalles_movimientos VALUES("61","9.20","1","1","104","29");
INSERT INTO detalles_movimientos VALUES("62","20.00","1","1","113","30");
INSERT INTO detalles_movimientos VALUES("63","20.00","6","0","114","30");
INSERT INTO detalles_movimientos VALUES("64","20.00","7","1","115","30");
INSERT INTO detalles_movimientos VALUES("65","5.00","2","0","116","31");
INSERT INTO detalles_movimientos VALUES("66","10.50","1","1","117","29");



TRUNCATE TABLE ingreso_detalles;
INSERT INTO ingreso_detalles VALUES("1","12.00","11.00","0.00","29","2","1");
INSERT INTO ingreso_detalles VALUES("2","13.00","12.00","0.00","30","1","2");
INSERT INTO ingreso_detalles VALUES("3","5.00","4.00","4.00","31","1","2");
INSERT INTO ingreso_detalles VALUES("4","20.00","12.00","16.00","30","1","3");
INSERT INTO ingreso_detalles VALUES("5","10.50","9.18","10.00","29","1","4");
INSERT INTO ingreso_detalles VALUES("6","13.00","12.00","6.00","31","1","5");
INSERT INTO ingreso_detalles VALUES("7","12.00","1.00","1.00","29","1","6");
INSERT INTO ingreso_detalles VALUES("8","12.00","12.00","12.00","29","1","9");
INSERT INTO ingreso_detalles VALUES("9","12.00","12.00","1.00","29","1","10");



TRUNCATE TABLE ingreso_productos;
INSERT INTO ingreso_productos VALUES("1","2022-10-21","23442","2022-10-21","PAGADA","11.50","1","","1");
INSERT INTO ingreso_productos VALUES("2","2022-10-22","1222","2022-10-22","PAGADA","16.00","1","","1");
INSERT INTO ingreso_productos VALUES("3","2022-10-22","1213","2022-10-21","PAGADA","72.00","1","","1");
INSERT INTO ingreso_productos VALUES("4","2022-10-24","111","2022-10-26","PAGADA","91.80","1","","1");
INSERT INTO ingreso_productos VALUES("5","2022-10-25","1234","2022-10-25","PAGADA","72.00","1","","1");
INSERT INTO ingreso_productos VALUES("6","2022-10-26","3333","2022-10-28","PAGADA","1.00","1","","1");
INSERT INTO ingreso_productos VALUES("7","2022-10-25","1111","2022-10-25","PAGADA","0.00","1","","1");
INSERT INTO ingreso_productos VALUES("8","2022-10-26","12223","2022-10-26","PAGADA","0.00","1","2","1");
INSERT INTO ingreso_productos VALUES("9","2022-10-26","12345","2022-10-25","PAGADA","144.00","1","2","1");
INSERT INTO ingreso_productos VALUES("10","2022-10-26","12223","2022-10-26","PAGADA","12.00","1","2","1");



TRUNCATE TABLE marca_producto;
INSERT INTO marca_producto VALUES("1","JUANA","1");
INSERT INTO marca_producto VALUES("2","JUQUERY","0");
INSERT INTO marca_producto VALUES("3","EL TUNAL","1");



TRUNCATE TABLE metodo_pago;
INSERT INTO metodo_pago VALUES("1","EFECTIVO");
INSERT INTO metodo_pago VALUES("2","TARJETA");
INSERT INTO metodo_pago VALUES("3","TRANSFERENCIA");
INSERT INTO metodo_pago VALUES("4","DOLARES");



TRUNCATE TABLE movimientos;
INSERT INTO movimientos VALUES("90","","19.00","2022-10-13","12:08:00","PAGADA","1","1","2","","","1");
INSERT INTO movimientos VALUES("91","","15.00","2022-10-13","12:09:00","A CREDITO","1","1","2","","","1");
INSERT INTO movimientos VALUES("92","Transporte","20.00","2022-10-13","12:09:00","PAGADA","1","8","3","","","1");
INSERT INTO movimientos VALUES("93","compra verduras","60.00","2022-10-13","12:11:00","PAGADA","1","3","1","","","1");
INSERT INTO movimientos VALUES("94","","9.20","2022-10-18","14:17:00","PAGADA","1","1","1","","","1");
INSERT INTO movimientos VALUES("95","","9.20","2022-10-18","14:20:00","PAGADA","1","1","1","","","3");
INSERT INTO movimientos VALUES("96","","9.20","2022-10-18","14:50:00","PAGADA","1","1","1","","","1");
INSERT INTO movimientos VALUES("97","","46.00","2022-10-18","14:50:00","PAGADA","1","1","1","","","3");
INSERT INTO movimientos VALUES("98","","55.20","2022-10-18","14:59:00","PAGADA","1","1","1","","","1");
INSERT INTO movimientos VALUES("99","","55.20","2022-10-18","14:59:00","PAGADA","1","1","1","","","1");
INSERT INTO movimientos VALUES("100","","55.20","2022-10-18","15:06:00","PAGADA","1","1","1","","","3");
INSERT INTO movimientos VALUES("101","","18.40","2022-10-18","15:06:00","PAGADA","0","1","1","","","1");
INSERT INTO movimientos VALUES("102","","9.20","2022-10-18","16:22:00","PAGADA","1","1","1","","","3");
INSERT INTO movimientos VALUES("103","","9.20","2022-10-18","16:29:00","PAGADA","0","1","1","","","3");
INSERT INTO movimientos VALUES("104","","9.20","2022-10-21","12:34:00","A CREDITO","1","1","1","","1","1");
INSERT INTO movimientos VALUES("105","compra verduras","5.00","2022-10-21","12:41:00","PAGADA","1","3","4","1","","3");
INSERT INTO movimientos VALUES("106","","5.00","2022-10-01","12:41:00","A CREDITO","1","3","2","1","","1");
INSERT INTO movimientos VALUES("107","","5.00","2022-10-01","12:46:00","A CREDITO","1","3","2","1","","1");
INSERT INTO movimientos VALUES("108","","5.00","2022-10-13","14:54:00","A CREDITO","1","4","2","1","","1");
INSERT INTO movimientos VALUES("109","","5.00","2022-10-21","15:38:00","A CREDITO","1","3","","1","","1");
INSERT INTO movimientos VALUES("110","","5.00","2022-10-21","15:38:00","PAGADA","1","3","","","","3");
INSERT INTO movimientos VALUES("111","","5.00","2022-10-21","15:44:00","PAGADA","1","3","","","","3");
INSERT INTO movimientos VALUES("112","","5.00","2022-10-21","15:44:00","PAGADA","1","3","","","","3");
INSERT INTO movimientos VALUES("113","","20.00","2022-10-24","20:41:00","PAGADA","1","1","1","","","1");
INSERT INTO movimientos VALUES("114","","120.00","2022-10-24","20:42:00","PAGADA","0","1","1","","","1");
INSERT INTO movimientos VALUES("115","","140.00","2022-10-24","20:48:00","PAGADA","1","1","1","","","3");
INSERT INTO movimientos VALUES("116","","10.00","2022-10-24","20:48:00","PAGADA","0","1","1","","","3");
INSERT INTO movimientos VALUES("117","","10.50","2022-10-24","09:38:00","PAGADA","1","1","1","","","1");
INSERT INTO movimientos VALUES("118","","72.00","2022-10-25","17:49:00","PAGADA","1","3","","1","","3");
INSERT INTO movimientos VALUES("119","","1.00","2022-10-26","18:21:00","PAGADA","1","3","","1","","1");
INSERT INTO movimientos VALUES("120","","5.00","2022-10-26","18:21:00","A CREDITO","1","4","","1","","1");
INSERT INTO movimientos VALUES("121","","0.00","2022-10-25","18:47:00","PAGADA","1","3","","1","","3");
INSERT INTO movimientos VALUES("122","","0.00","2022-10-26","19:05:00","PAGADA","1","3","","1","","1");
INSERT INTO movimientos VALUES("123","","144.00","2022-10-26","19:10:00","PAGADA","1","3","4","1","","3");
INSERT INTO movimientos VALUES("124","","12.00","2022-10-26","19:17:00","PAGADA","1","3","2","1","","1");



TRUNCATE TABLE notificaciones;
INSERT INTO notificaciones VALUES("18","daniela tiene una dueda atrasada","la deuda es del 2022-10-21 por 9.20 bs","0","2022-10-22 03:03:41");
INSERT INTO notificaciones VALUES("19","ARIANNA tiene una dueda atrasada","la deuda es del 2022-10-01 por 5.00 bs","0","2022-10-22 03:03:42");
INSERT INTO notificaciones VALUES("20","ARIANNA tiene una dueda atrasada","la deuda es del 2022-10-01 por 5.00 bs","0","2022-10-22 03:03:42");
INSERT INTO notificaciones VALUES("21","ARIANNA tiene una dueda atrasada","la deuda es del 2022-10-13 por 5.00 bs","0","2022-10-22 03:03:43");
INSERT INTO notificaciones VALUES("22","daniela tiene una dueda atrasada","la deuda es del 2022-10-21 por 9.20 bs","0","2022-10-22 03:03:36");
INSERT INTO notificaciones VALUES("23"," Tienes una dueda atrasada conARIANNA","la deuda es del 2022-10-01 por 5.00 bs","0","2022-10-22 03:03:39");
INSERT INTO notificaciones VALUES("24"," Tienes una dueda atrasada conARIANNA","la deuda es del 2022-10-01 por 5.00 bs","0","2022-10-22 03:03:40");
INSERT INTO notificaciones VALUES("25"," Tienes una dueda atrasada conARIANNA","la deuda es del 2022-10-13 por 5.00 bs","0","2022-10-22 03:03:41");



TRUNCATE TABLE permisos;
INSERT INTO permisos VALUES("1","Consultar Ventas","1");
INSERT INTO permisos VALUES("2","Modificar Balance","1");
INSERT INTO permisos VALUES("3","Crear Ventas","1");
INSERT INTO permisos VALUES("4","Anular Ventas","1");
INSERT INTO permisos VALUES("5","Consultar Inventario","1");
INSERT INTO permisos VALUES("6","Modificar Inventario","");
INSERT INTO permisos VALUES("7","Crear Inventario","1");
INSERT INTO permisos VALUES("8","Eliminar Inventario","1");
INSERT INTO permisos VALUES("9","Consultar Deudas","1");
INSERT INTO permisos VALUES("10","Abonar Deudas","1");
INSERT INTO permisos VALUES("12","Eliminar Deudas","1");
INSERT INTO permisos VALUES("13","Consultar Proveedores","1");
INSERT INTO permisos VALUES("14","Modificar Proveedores","1");
INSERT INTO permisos VALUES("15","Crear Proveedores","1");
INSERT INTO permisos VALUES("16","Eliminar Proveedores","1");
INSERT INTO permisos VALUES("17","Consultar Clientes","1");
INSERT INTO permisos VALUES("18","Modificar Clientes","1");
INSERT INTO permisos VALUES("19","Crear Clientes","1");
INSERT INTO permisos VALUES("20","Eliminar Clientes","1");
INSERT INTO permisos VALUES("21","Consultar Usuarios","1");
INSERT INTO permisos VALUES("22","Modificar Usuarios","1");
INSERT INTO permisos VALUES("23","Crear Usuarios","");
INSERT INTO permisos VALUES("24","Eliminar Usuarios","1");
INSERT INTO permisos VALUES("25","Estadisticas Ventas","1");
INSERT INTO permisos VALUES("26","Consultar Reportes Balance","1");
INSERT INTO permisos VALUES("27","Consultar Reportes Inventario","1");
INSERT INTO permisos VALUES("28","Consultar Reportes Deudas","1");
INSERT INTO permisos VALUES("29","Crear Respaldo Base Datos","1");
INSERT INTO permisos VALUES("30","Modificar Base Datos","1");
INSERT INTO permisos VALUES("31","Consultar Roles","1");
INSERT INTO permisos VALUES("32","Modificar Roles","1");
INSERT INTO permisos VALUES("33","Crear Roles","1");
INSERT INTO permisos VALUES("34","Eliminar Roles","1");
INSERT INTO permisos VALUES("35","Crear Permisos","1");
INSERT INTO permisos VALUES("36","Consultar Reportes Bitacora","1");
INSERT INTO permisos VALUES("37","Consultar Gastos","1");
INSERT INTO permisos VALUES("38","Registrar Gastos","1");
INSERT INTO permisos VALUES("39","Eliminar Gastos","1");
INSERT INTO permisos VALUES("40","Consultar Ingresos","1");
INSERT INTO permisos VALUES("41","Crear Ingresos","1");
INSERT INTO permisos VALUES("42","Anular Ingresos","1");
INSERT INTO permisos VALUES("43","Consultar Productos","1");
INSERT INTO permisos VALUES("44","Crear Productos","1");
INSERT INTO permisos VALUES("45","Modificar Productos","1");
INSERT INTO permisos VALUES("46","Eliminar Productos","1");
INSERT INTO permisos VALUES("47","Consultar Categorias","1");
INSERT INTO permisos VALUES("48","Modificar Categorias","1");
INSERT INTO permisos VALUES("49","Eliminar Categorias","1");
INSERT INTO permisos VALUES("50","Crear Categorias","1");
INSERT INTO permisos VALUES("51","Consultar Presentaciones","1");
INSERT INTO permisos VALUES("52","Modificar Presentaciones","1");
INSERT INTO permisos VALUES("53","Crear Presentaciones","1");
INSERT INTO permisos VALUES("54","Eliminar Presentaciones","1");
INSERT INTO permisos VALUES("55","Consultar Marcas","1");
INSERT INTO permisos VALUES("56","Modificar Marcas","1");
INSERT INTO permisos VALUES("57","Crear Marcas","1");
INSERT INTO permisos VALUES("58","Eliminar Marcas","1");
INSERT INTO permisos VALUES("59","Estadisticas Gastos","1");
INSERT INTO permisos VALUES("60","Estadisticas Vendidos","1");



TRUNCATE TABLE presentacion_producto;
INSERT INTO presentacion_producto VALUES("1","1","KG","1","1");
INSERT INTO presentacion_producto VALUES("2","200","MG","1","0");
INSERT INTO presentacion_producto VALUES("3","500","ML","1","1");
INSERT INTO presentacion_producto VALUES("4","3","G","4","0");
INSERT INTO presentacion_producto VALUES("5","1","UNIDAD","30","1");



TRUNCATE TABLE productos;
INSERT INTO productos VALUES("29","HARINA","HARINA DE MAIZ BLANCO","","1","","1","1");
INSERT INTO productos VALUES("30","huevos","","","1","33","3","5");
INSERT INTO productos VALUES("31","jugo naranja","naranja","assets/images/productos/Chrysanthemum.jpg","1","32","3","3");
INSERT INTO productos VALUES("32","FAROS","","","0","32","1","1");



TRUNCATE TABLE proveedores;
INSERT INTO proveedores VALUES("1","ARIANNA","27629581","CI","04267346011","","1");



TRUNCATE TABLE rol;
INSERT INTO rol VALUES("1","vendedor","ejecuta las ventas","1");
INSERT INTO rol VALUES("3","superusuario","tiene todos los permisos","1");
INSERT INTO rol VALUES("8","aASDasa","","0");
INSERT INTO rol VALUES("9","werwer","","0");
INSERT INTO rol VALUES("10","sdfsdf","","0");
INSERT INTO rol VALUES("11","eqwsadas","","0");
INSERT INTO rol VALUES("12","encargado","tiene todos los permisos , menos el mantenimiento","1");



TRUNCATE TABLE rol_permiso;
INSERT INTO rol_permiso VALUES("73","1","36");
INSERT INTO rol_permiso VALUES("234","12","21");
INSERT INTO rol_permiso VALUES("235","12","22");
INSERT INTO rol_permiso VALUES("236","12","23");
INSERT INTO rol_permiso VALUES("237","12","24");
INSERT INTO rol_permiso VALUES("238","12","5");
INSERT INTO rol_permiso VALUES("239","12","1");
INSERT INTO rol_permiso VALUES("240","12","3");
INSERT INTO rol_permiso VALUES("241","12","4");
INSERT INTO rol_permiso VALUES("242","12","37");
INSERT INTO rol_permiso VALUES("243","12","38");
INSERT INTO rol_permiso VALUES("244","12","39");
INSERT INTO rol_permiso VALUES("245","12","40");
INSERT INTO rol_permiso VALUES("246","12","41");
INSERT INTO rol_permiso VALUES("247","12","42");
INSERT INTO rol_permiso VALUES("248","12","43");
INSERT INTO rol_permiso VALUES("249","12","45");
INSERT INTO rol_permiso VALUES("250","12","44");
INSERT INTO rol_permiso VALUES("251","12","46");
INSERT INTO rol_permiso VALUES("252","12","47");
INSERT INTO rol_permiso VALUES("253","12","48");
INSERT INTO rol_permiso VALUES("254","12","50");
INSERT INTO rol_permiso VALUES("255","12","49");
INSERT INTO rol_permiso VALUES("256","12","51");
INSERT INTO rol_permiso VALUES("257","12","52");
INSERT INTO rol_permiso VALUES("258","12","53");
INSERT INTO rol_permiso VALUES("259","12","54");
INSERT INTO rol_permiso VALUES("260","12","55");
INSERT INTO rol_permiso VALUES("261","12","56");
INSERT INTO rol_permiso VALUES("262","12","57");
INSERT INTO rol_permiso VALUES("263","12","58");
INSERT INTO rol_permiso VALUES("264","12","9");
INSERT INTO rol_permiso VALUES("265","12","10");
INSERT INTO rol_permiso VALUES("266","12","12");
INSERT INTO rol_permiso VALUES("267","12","17");
INSERT INTO rol_permiso VALUES("268","12","18");
INSERT INTO rol_permiso VALUES("269","12","19");
INSERT INTO rol_permiso VALUES("270","12","20");
INSERT INTO rol_permiso VALUES("271","12","13");
INSERT INTO rol_permiso VALUES("272","12","14");
INSERT INTO rol_permiso VALUES("273","12","15");
INSERT INTO rol_permiso VALUES("274","12","16");
INSERT INTO rol_permiso VALUES("275","12","25");
INSERT INTO rol_permiso VALUES("276","12","59");
INSERT INTO rol_permiso VALUES("277","12","60");
INSERT INTO rol_permiso VALUES("278","12","27");
INSERT INTO rol_permiso VALUES("279","12","26");
INSERT INTO rol_permiso VALUES("280","12","28");
INSERT INTO rol_permiso VALUES("281","12","36");
INSERT INTO rol_permiso VALUES("282","12","31");
INSERT INTO rol_permiso VALUES("283","12","32");
INSERT INTO rol_permiso VALUES("284","12","33");
INSERT INTO rol_permiso VALUES("285","12","34");
INSERT INTO rol_permiso VALUES("286","12","35");
INSERT INTO rol_permiso VALUES("342","3","21");
INSERT INTO rol_permiso VALUES("343","3","22");
INSERT INTO rol_permiso VALUES("344","3","23");
INSERT INTO rol_permiso VALUES("345","3","24");
INSERT INTO rol_permiso VALUES("346","3","5");
INSERT INTO rol_permiso VALUES("347","3","1");
INSERT INTO rol_permiso VALUES("348","3","3");
INSERT INTO rol_permiso VALUES("349","3","4");
INSERT INTO rol_permiso VALUES("350","3","37");
INSERT INTO rol_permiso VALUES("351","3","38");
INSERT INTO rol_permiso VALUES("352","3","39");
INSERT INTO rol_permiso VALUES("353","3","40");
INSERT INTO rol_permiso VALUES("354","3","41");
INSERT INTO rol_permiso VALUES("355","3","42");
INSERT INTO rol_permiso VALUES("356","3","43");
INSERT INTO rol_permiso VALUES("357","3","45");
INSERT INTO rol_permiso VALUES("358","3","44");
INSERT INTO rol_permiso VALUES("359","3","46");
INSERT INTO rol_permiso VALUES("360","3","47");
INSERT INTO rol_permiso VALUES("361","3","48");
INSERT INTO rol_permiso VALUES("362","3","50");
INSERT INTO rol_permiso VALUES("363","3","49");
INSERT INTO rol_permiso VALUES("364","3","51");
INSERT INTO rol_permiso VALUES("365","3","52");
INSERT INTO rol_permiso VALUES("366","3","53");
INSERT INTO rol_permiso VALUES("367","3","54");
INSERT INTO rol_permiso VALUES("368","3","55");
INSERT INTO rol_permiso VALUES("369","3","56");
INSERT INTO rol_permiso VALUES("370","3","57");
INSERT INTO rol_permiso VALUES("371","3","58");
INSERT INTO rol_permiso VALUES("372","3","9");
INSERT INTO rol_permiso VALUES("373","3","10");
INSERT INTO rol_permiso VALUES("374","3","12");
INSERT INTO rol_permiso VALUES("375","3","17");
INSERT INTO rol_permiso VALUES("376","3","18");
INSERT INTO rol_permiso VALUES("377","3","19");
INSERT INTO rol_permiso VALUES("378","3","20");
INSERT INTO rol_permiso VALUES("379","3","13");
INSERT INTO rol_permiso VALUES("380","3","14");
INSERT INTO rol_permiso VALUES("381","3","15");
INSERT INTO rol_permiso VALUES("382","3","16");
INSERT INTO rol_permiso VALUES("383","3","25");
INSERT INTO rol_permiso VALUES("384","3","59");
INSERT INTO rol_permiso VALUES("385","3","60");
INSERT INTO rol_permiso VALUES("386","3","27");
INSERT INTO rol_permiso VALUES("387","3","26");
INSERT INTO rol_permiso VALUES("388","3","28");
INSERT INTO rol_permiso VALUES("389","3","36");
INSERT INTO rol_permiso VALUES("390","3","29");
INSERT INTO rol_permiso VALUES("391","3","30");
INSERT INTO rol_permiso VALUES("392","3","31");
INSERT INTO rol_permiso VALUES("393","3","32");
INSERT INTO rol_permiso VALUES("394","3","33");
INSERT INTO rol_permiso VALUES("395","3","34");
INSERT INTO rol_permiso VALUES("396","3","35");



TRUNCATE TABLE usuarios;
INSERT INTO usuarios VALUES("1","SUPERUSUARIO","ezcolmenarjose@gmail.com","MEVZS280RDNOR3Y2VlpEdHRlbDk0Zz09","1","3");
INSERT INTO usuarios VALUES("3","ARIANNA","aripaocol@gmail.com","OVNRMjlzWkNQamp4SHVpSzNwYW5lZz09","1","3");
INSERT INTO usuarios VALUES("18","FABIANA","fabianal@gmaul.com","OVNRMjlzWkNQamp4SHVpSzNwYW5lZz09","1","1");



SET FOREIGN_KEY_CHECKS=1;
DELETE FROM bitacora WHERE fecha > "2023-02-12 22:41:26";