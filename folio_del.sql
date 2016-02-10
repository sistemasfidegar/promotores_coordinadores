/*
Navicat PGSQL Data Transfer

Source Server         : FIDEGAR
Source Server Version : 90401
Source Host           : localhost:5432
Source Database       : promotores_coordinadores
Source Schema         : public

Target Server Type    : PGSQL
Target Server Version : 90401
File Encoding         : 65001

Date: 2016-02-10 12:11:54
*/


-- ----------------------------
-- Table structure for folio_del
-- ----------------------------
DROP TABLE IF EXISTS "public"."folio_del";
CREATE TABLE "public"."folio_del" (
"id_delegacion" numeric(10),
"delegacion" varchar(50) COLLATE "default",
"siglas" varchar(10) COLLATE "default",
"c_bach" numeric(10),
"c_uni" numeric(10),
"p_bach" numeric(10),
"p_uni" numeric(10),
"ciclo" numeric(10)
)
WITH (OIDS=FALSE)

;

-- ----------------------------
-- Records of folio_del
-- ----------------------------
INSERT INTO "public"."folio_del" VALUES ('2', 'AZCAPOTZALCO', 'AZC', '37', '2', '85', '6', '0');
INSERT INTO "public"."folio_del" VALUES ('3', 'COYOACÁN', 'COY', '55', '3', '127', '8', '0');
INSERT INTO "public"."folio_del" VALUES ('4', 'CUAJIMALPA DE MORELOS', 'CUJ', '39', '2', '90', '6', '0');
INSERT INTO "public"."folio_del" VALUES ('5', 'GUSTAVO A. MADERO', 'GAM', '119', '6', '273', '16', '0');
INSERT INTO "public"."folio_del" VALUES ('6', 'IZTACALCO', 'IZT', '47', '3', '109', '7', '0');
INSERT INTO "public"."folio_del" VALUES ('7', 'IZTAPALAPA', 'IZP', '303', '16', '702', '38', '0');
INSERT INTO "public"."folio_del" VALUES ('8', 'LA MAGDALENA CONTRERAS', 'MAC', '21', '1', '48', '4', '0');
INSERT INTO "public"."folio_del" VALUES ('9', 'MILPA ALTA', 'MIL', '15', '1', '35', '4', '0');
INSERT INTO "public"."folio_del" VALUES ('10', 'ÁLVARO OBREGÓN', 'AOB', '63', '3', '146', '9', '0');
INSERT INTO "public"."folio_del" VALUES ('11', 'TLAHUAC', 'TLH', '42', '2', '97', '6', '0');
INSERT INTO "public"."folio_del" VALUES ('12', 'TLALPAN', 'TLP', '63', '3', '144', '9', '0');
INSERT INTO "public"."folio_del" VALUES ('13', 'XOCHIMILCO', 'XOC', '47', '3', '109', '7', '0');
INSERT INTO "public"."folio_del" VALUES ('14', 'BENITO JUÁREZ', 'BJU', '19', '1', '44', '4', '0');
INSERT INTO "public"."folio_del" VALUES ('15', 'CUAUHTÉMOC', 'CUH', '12', '1', '29', '2', '0');
INSERT INTO "public"."folio_del" VALUES ('16', 'MIGUEL HIDALGO', 'MHI', '21', '1', '48', '4', '0');
INSERT INTO "public"."folio_del" VALUES ('17', 'VENUSTIANO CARRANZA', 'VCA', '44', '2', '100', '7', '0');

-- ----------------------------
-- Alter Sequences Owned By 
-- ----------------------------
