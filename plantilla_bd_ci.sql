/*
Navicat PGSQL Data Transfer

Source Server         : localhost
Source Server Version : 90401
Source Host           : localhost:5432
Source Database       : promotores_coordinadores
Source Schema         : public

Target Server Type    : PGSQL
Target Server Version : 90401
File Encoding         : 65001

Date: 2015-11-03 18:33:30
*/


-- ----------------------------
-- Sequence structure for bitacora_accesos_id_bitacora_seq
-- ----------------------------
--DROP SEQUENCE "public"."bitacora_accesos_id_bitacora_seq";
CREATE SEQUENCE "public"."bitacora_accesos_id_bitacora_seq"
 INCREMENT 1
 MINVALUE 1
 MAXVALUE 9223372036854775807
 START 138
 CACHE 1;
SELECT setval('"public"."bitacora_accesos_id_bitacora_seq"', 138, true);

-- ----------------------------
-- Sequence structure for cat_perfil_id_perfil_seq
-- ----------------------------
--DROP SEQUENCE "public"."cat_perfil_id_perfil_seq";
CREATE SEQUENCE "public"."cat_perfil_id_perfil_seq"
 INCREMENT 1
 MINVALUE 1
 MAXVALUE 9223372036854775807
 START 3
 CACHE 1;
SELECT setval('"public"."cat_perfil_id_perfil_seq"', 3, true);

-- ----------------------------
-- Sequence structure for usuario_id_usuario_seq
-- ----------------------------
--DROP SEQUENCE "public"."usuario_id_usuario_seq";
CREATE SEQUENCE "public"."usuario_id_usuario_seq"
 INCREMENT 1
 MINVALUE 1
 MAXVALUE 9223372036854775807
 START 11
 CACHE 1;
SELECT setval('"public"."usuario_id_usuario_seq"', 11, true);

-- ----------------------------
-- Table structure for bitacora_accesos
-- ----------------------------
--DROP TABLE IF EXISTS "public"."bitacora_accesos";
CREATE TABLE "public"."bitacora_accesos" (
"id_bitacora" int8 DEFAULT nextval('bitacora_accesos_id_bitacora_seq'::regclass) NOT NULL,
"id_usuario" int2 NOT NULL,
"usuario" varchar(50) COLLATE "default" NOT NULL,
"fecha" timestamp(6) DEFAULT now(),
"ip" varchar(15) COLLATE "default"
)
WITH (OIDS=FALSE)

;

-- ----------------------------
-- Records of bitacora_accesos
-- ----------------------------
INSERT INTO "public"."bitacora_accesos" VALUES ('131', '2', 'nsanchezm', '2015-10-29 17:41:09.819', '::1');
INSERT INTO "public"."bitacora_accesos" VALUES ('132', '2', 'nsanchezm', '2015-10-29 18:27:57.383', '::1');
INSERT INTO "public"."bitacora_accesos" VALUES ('133', '3', 'director', '2015-10-29 18:34:56.255', '::1');
INSERT INTO "public"."bitacora_accesos" VALUES ('134', '1', 'admin', '2015-10-29 18:37:38.788', '::1');
INSERT INTO "public"."bitacora_accesos" VALUES ('135', '1', 'admin', '2015-10-29 18:42:49.122', '192.168.50.96');
INSERT INTO "public"."bitacora_accesos" VALUES ('136', '3', 'director', '2015-10-29 18:56:32.506', '192.168.50.105');
INSERT INTO "public"."bitacora_accesos" VALUES ('137', '1', 'admin', '2015-10-29 18:57:11.472', '192.168.50.105');
INSERT INTO "public"."bitacora_accesos" VALUES ('138', '3', 'director', '2015-10-30 10:38:54.095', '192.168.50.96');

-- ----------------------------
-- Table structure for cat_perfil
-- ----------------------------
--DROP TABLE IF EXISTS "public"."cat_perfil";
CREATE TABLE "public"."cat_perfil" (
"id_perfil" numeric(32) DEFAULT nextval('cat_perfil_id_perfil_seq'::regclass) NOT NULL,
"perfil" varchar(50) COLLATE "default",
"activo" bool DEFAULT true
)
WITH (OIDS=FALSE)

;

-- ----------------------------
-- Records of cat_perfil
-- ----------------------------
INSERT INTO "public"."cat_perfil" VALUES ('1', 'Administrador', 't');
INSERT INTO "public"."cat_perfil" VALUES ('2', 'Operador', 't');
INSERT INTO "public"."cat_perfil" VALUES ('3', 'Director', 't');
INSERT INTO "public"."cat_perfil" VALUES ('4', 'Operador Especial', 't');

-- ----------------------------
-- Table structure for ci_sessions
-- ----------------------------
--DROP TABLE IF EXISTS "public"."ci_sessions";
CREATE TABLE "public"."ci_sessions" (
"session_id" varchar(32) COLLATE "default" DEFAULT ''::character varying NOT NULL,
"user_agent" varchar(255) COLLATE "default" DEFAULT NULL::character varying,
"ip_address" varchar(20) COLLATE "default" DEFAULT NULL::character varying,
"last_activity" int8,
"user_data" text COLLATE "default"
)
WITH (OIDS=FALSE)

;

-- ----------------------------
-- Records of ci_sessions
-- ----------------------------
INSERT INTO "public"."ci_sessions" VALUES ('059ff141ffba2713c2d898fa53537884', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:40.0) Gecko/20100101 Firefox/40.0', '192.168.50.105', '1443039083', '');
INSERT INTO "public"."ci_sessions" VALUES ('145efebf21f042c2763369e9406d413b', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:41.0) Gecko/20100101 Firefox/41.0', '192.168.50.105', '1446166657', '');
INSERT INTO "public"."ci_sessions" VALUES ('14e797db2e2a0f83622554d12d8ad4dd', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:40.0) Gecko/20100101 Firefox/40.0', '::1', '1442604534', '');
INSERT INTO "public"."ci_sessions" VALUES ('1715c64c210dfa75e8b538daf819a4f4', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64; Trident/7.0; rv:11.0) like Gecko', '192.168.30.97', '1444344574', '');
INSERT INTO "public"."ci_sessions" VALUES ('25042b3d01d984561dbc783d3e4c89ca', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:41.0) Gecko/20100101 Firefox/41.0', '192.168.50.105', '1444765702', '');
INSERT INTO "public"."ci_sessions" VALUES ('29c1726e37a38309770e59683fe9597c', 'Mozilla/5.0 (Windows NT 6.2; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/42.0.2311.135 Safari/537.36', '10.10.11.150', '1430871853', '');
INSERT INTO "public"."ci_sessions" VALUES ('2c228d442f42d4c4a2f9e38cfa606685', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:41.0) Gecko/20100101 Firefox/41.0', '::1', '1445305094', '');
INSERT INTO "public"."ci_sessions" VALUES ('2ed36bcfac085b27ba4fbe9dafdbf646', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:41.0) Gecko/20100101 Firefox/41.0', '::1', '1445384800', '');
INSERT INTO "public"."ci_sessions" VALUES ('31d60d3d61f61def91f79fec6b54ce20', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:41.0) Gecko/20100101 Firefox/41.0', '::1', '1446165547', '');
INSERT INTO "public"."ci_sessions" VALUES ('5eee85a65675b2f13c35f1ef3e3d0fce', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:40.0) Gecko/20100101 Firefox/40.0', '::1', '1443203195', '');
INSERT INTO "public"."ci_sessions" VALUES ('686738a1fdec2d25556337d85373a7f9', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/45.0.2454.99 Safari/537.36', '192.168.50.96', '1443208349', '');
INSERT INTO "public"."ci_sessions" VALUES ('779b68f5dd12d8637236eecaf7019ed0', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/46.0.2490.80 Safari/537.36', '192.168.50.96', '1446166413', '');
INSERT INTO "public"."ci_sessions" VALUES ('7f94594b18e85cab1268f1180df79ec2', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/46.0.2490.80 Safari/537.36', '192.168.50.105', '1446167410', '');
INSERT INTO "public"."ci_sessions" VALUES ('80950ddc22bf65aaa916c67d96c62b61', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:40.0) Gecko/20100101 Firefox/40.0', '::1', '1442538102', '');
INSERT INTO "public"."ci_sessions" VALUES ('86205d5f187cb2d8074f3c7c2d330891', 'Mozilla/5.0 (Windows NT 6.3; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/45.0.2454.93 Safari/537.36', '192.168.30.88', '1443028529', '');
INSERT INTO "public"."ci_sessions" VALUES ('8ff325b2163b83fae3eb2e79dc6077d9', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:40.0) Gecko/20100101 Firefox/40.0', '::1', '1442276993', '');
INSERT INTO "public"."ci_sessions" VALUES ('90a84fc5866af0841e4ec722a5ba5ead', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:41.0) Gecko/20100101 Firefox/41.0', '::1', '1444957994', '');
INSERT INTO "public"."ci_sessions" VALUES ('951816f5518ce3883494db7cff2324e0', 'Mozilla/5.0 (Windows NT 6.3; WOW64; rv:41.0) Gecko/20100101 Firefox/41.0', '192.168.30.97', '1444345492', '');
INSERT INTO "public"."ci_sessions" VALUES ('96a79d6af76d4b15c349f34f7562f14a', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:41.0) Gecko/20100101 Firefox/41.0', '192.168.50.105', '1444340020', '');
INSERT INTO "public"."ci_sessions" VALUES ('a35502bca93e896ccb83b12ea8519256', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:37.0) Gecko/20100101 Firefox/37.0', '::1', '1430957608', '');
INSERT INTO "public"."ci_sessions" VALUES ('ac1e691306db1d5f6472e5e45d681089', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:41.0) Gecko/20100101 Firefox/41.0', '192.168.50.105', '1446165637', '');
INSERT INTO "public"."ci_sessions" VALUES ('acb782b0e13e39eec3cb4250c929dcd4', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/45.0.2454.93 Safari/537.36', '192.168.50.105', '1442949985', '');
INSERT INTO "public"."ci_sessions" VALUES ('d0f9236304cdd0ebcb47ffe120ea66dc', 'Mozilla/5.0 (Windows NT 6.3; WOW64; Trident/7.0; rv:11.0) like Gecko', '192.168.30.97', '1444344943', '');
INSERT INTO "public"."ci_sessions" VALUES ('d27163a49137078b7259ad68639d8d5b', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:40.0) Gecko/20100101 Firefox/40.0', '::1', '1442863829', '');
INSERT INTO "public"."ci_sessions" VALUES ('d2bc76aa6dcdebb3004d50a012092158', 'Mozilla/5.0 (Windows NT 6.3; WOW64; rv:35.0) Gecko/20100101 Firefox/35.0', '192.168.30.108', '1445013417', '');
INSERT INTO "public"."ci_sessions" VALUES ('d8494bbe23d1750985b8c03390953a27', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:40.0) Gecko/20100101 Firefox/40.0', '::1', '1442346479', '');
INSERT INTO "public"."ci_sessions" VALUES ('e0fed6f7a814e088f72f2710b94d25da', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/45.0.2454.99 Safari/537.36', '192.168.50.105', '1443119963', '');
INSERT INTO "public"."ci_sessions" VALUES ('e4be66987dc0dcf8b08138cbea404542', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/46.0.2490.80 Safari/537.36', '192.168.50.96', '1446223115', 'a:12:{s:9:"user_data";s:0:"";s:9:"logged_in";b:1;s:10:"id_usuario";s:1:"3";s:7:"usuario";s:8:"director";s:9:"id_perfil";s:1:"3";s:6:"nombre";s:8:"Director";s:15:"nombre_completo";s:22:"Director de Zona Norte";s:6:"perfil";s:8:"Director";s:13:"id_delegacion";s:1:"0";s:10:"delegacion";N;s:8:"pageSize";i:20;s:7:"externo";b:0;}');
INSERT INTO "public"."ci_sessions" VALUES ('e6519db01920d6a3f88cdbbd2dd642c9', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:41.0) Gecko/20100101 Firefox/41.0', '::1', '1445040179', '');
INSERT INTO "public"."ci_sessions" VALUES ('e8eef71be3003d54dcec893b5292e002', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:40.0) Gecko/20100101 Firefox/40.0', '::1', '1443147942', '');
INSERT INTO "public"."ci_sessions" VALUES ('f43d6be93b07ee5f5c747a650290cde6', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:41.0) Gecko/20100101 Firefox/41.0', '192.168.50.105', '1444958063', '');

-- ----------------------------
-- Table structure for usuario
-- ----------------------------
--DROP TABLE IF EXISTS "public"."usuario";
CREATE TABLE "public"."usuario" (
"id_usuario" int4 DEFAULT nextval('usuario_id_usuario_seq'::regclass) NOT NULL,
"nombre" varchar(50) COLLATE "default",
"paterno" varchar(50) COLLATE "default",
"materno" varchar(50) COLLATE "default",
"usuario" varchar(50) COLLATE "default",
"password" varchar(50) COLLATE "default",
"email" varchar(250) COLLATE "default",
"id_delegacion" int2,
"id_perfil" int2,
"activo" bool DEFAULT true
)
WITH (OIDS=FALSE)

;

-- ----------------------------
-- Records of usuario
-- ----------------------------
INSERT INTO "public"."usuario" VALUES ('1', 'Administrador', 'del', 'Sistema', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'nsanchezma@df.gob.mx', '0', '1', 't');
INSERT INTO "public"."usuario" VALUES ('2', 'Nazareth', 'Sánchez', 'Martínez', 'nsanchezm', '363f9b03b8b9701de6dee5994c1b1822', 'ing.naz@gmail.com', '13', '2', 't');
INSERT INTO "public"."usuario" VALUES ('3', 'Director', 'de', 'Zona Norte', 'director', '3d4e992d8d8a7d848724aa26ed7f4176', 'nazareth.sanchez.fidegar@gmail.com', '0', '3', 't');
INSERT INTO "public"."usuario" VALUES ('4', 'cony', 'jaramillo', 'montalvan', 'icony', 'c628078c6689b3f92cc5f0a0abc770fb', 'icony@gmail.com', '14', '2', 't');
INSERT INTO "public"."usuario" VALUES ('5', 'Alfredo', 'Dominguez', 'Marrufo', 'alfredo', '5c2bf15004e661d7b7c9394617143d07', 'alfredo.dominguez@fideicomisoed.df.gob.mx', '0', '3', 't');
INSERT INTO "public"."usuario" VALUES ('6', 'Perla', 'Dumas', 'Dumas', 'perla', '8a6e994673a6219e81fa6aa8eace93d1', 'perladumas@gmail.com', '0', '3', 't');
INSERT INTO "public"."usuario" VALUES ('7', 'Cesar', 'Martinez', 'Martinez', 'cesar', '6f597c1ddab467f7bf5498aad1b41899', 'cesar.martinez@fideicomisoed.df.gob.mx', '0', '3', 't');
INSERT INTO "public"."usuario" VALUES ('8', 'Rosalia', 'Tostado', 'Tostado', 'rosalia', 'cdaa9e38b6a2af66eb4e1958f23f0aaf', 'rosalia.tostado@fideicomisoed.df.gob.mx', '0', '3', 't');
INSERT INTO "public"."usuario" VALUES ('9', 'Operado CUA', 'Cuauhtémoc', 'Cuauhtémoc', 'operador_cua', '3a22961a9be57519cef1c628c6aacc5b', 'operador_cua@gmail.com', '15', '2', 't');
INSERT INTO "public"."usuario" VALUES ('10', 'Operador BJU', 'Benito', 'Juarez', 'operador_bju', 'a760ded06abcb003e089ba9e6dc65ef4', 'operador_bju@gmail.com', '14', '2', 't');
INSERT INTO "public"."usuario" VALUES ('11', 'Operador XOC', 'Xochimilco', 'Xochimilco', 'operador_xoch', 'f94a3e31aac3736cf3b6d69361944599', 'operador_xoch@gmail.com', '13', '2', 't');

-- ----------------------------
-- Alter Sequences Owned By 
-- ----------------------------
ALTER SEQUENCE "public"."bitacora_accesos_id_bitacora_seq" OWNED BY "bitacora_accesos"."id_bitacora";
ALTER SEQUENCE "public"."cat_perfil_id_perfil_seq" OWNED BY "cat_perfil"."id_perfil";
ALTER SEQUENCE "public"."usuario_id_usuario_seq" OWNED BY "usuario"."id_usuario";

-- ----------------------------
-- Primary Key structure for table bitacora_accesos
-- ----------------------------
ALTER TABLE "public"."bitacora_accesos" ADD PRIMARY KEY ("id_bitacora");

-- ----------------------------
-- Primary Key structure for table cat_perfil
-- ----------------------------
ALTER TABLE "public"."cat_perfil" ADD PRIMARY KEY ("id_perfil");

-- ----------------------------
-- Primary Key structure for table ci_sessions
-- ----------------------------
ALTER TABLE "public"."ci_sessions" ADD PRIMARY KEY ("session_id");

-- ----------------------------
-- Primary Key structure for table usuario
-- ----------------------------
ALTER TABLE "public"."usuario" ADD PRIMARY KEY ("id_usuario");
