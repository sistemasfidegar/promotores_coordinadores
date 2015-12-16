/*
Navicat PGSQL Data Transfer

Source Server         : Plantilla
Source Server Version : 90401
Source Host           : localhost:5432
Source Database       : promotores_coordinadores
Source Schema         : public

Target Server Type    : PGSQL
Target Server Version : 90401
File Encoding         : 65001

Date: 2015-12-15 19:04:26
*/


-- ----------------------------
-- Table structure for folios
-- ----------------------------
DROP TABLE IF EXISTS "public"."folios";
CREATE TABLE "public"."folios" (
"id_plantel" numeric(30),
"clave" varchar(200) COLLATE "default",
"consecutivo" numeric(32),
"id_ciclo" numeric(32)
)
WITH (OIDS=FALSE)

;

-- ----------------------------
-- Records of folios
-- ----------------------------
INSERT INTO "public"."folios" VALUES ('1', 'XOCENP1', '0', '1');
INSERT INTO "public"."folios" VALUES ('2', 'IZTENP2', '0', '1');
INSERT INTO "public"."folios" VALUES ('3', 'GAMENP3', '0', '1');
INSERT INTO "public"."folios" VALUES ('4', 'MHIENP4', '0', '1');
INSERT INTO "public"."folios" VALUES ('5', 'TLPENP5', '0', '1');
INSERT INTO "public"."folios" VALUES ('6', 'COYENP6', '0', '1');
INSERT INTO "public"."folios" VALUES ('7', 'VCAENP7', '0', '1');
INSERT INTO "public"."folios" VALUES ('8', 'AOBENP8', '0', '1');
INSERT INTO "public"."folios" VALUES ('9', 'GAMENP9', '0', '1');
INSERT INTO "public"."folios" VALUES ('10', 'AZCCCH', '0', '1');
INSERT INTO "public"."folios" VALUES ('11', 'GAMCCH', '0', '1');
INSERT INTO "public"."folios" VALUES ('12', 'IZPCCH', '0', '1');
INSERT INTO "public"."folios" VALUES ('13', 'COYCCH', '1', '1');
INSERT INTO "public"."folios" VALUES ('14', 'GAMCECYT1', '0', '1');
INSERT INTO "public"."folios" VALUES ('15', 'GAMCECYT2', '0', '1');
INSERT INTO "public"."folios" VALUES ('16', 'AZCCET4', '0', '1');
INSERT INTO "public"."folios" VALUES ('17', 'GAMCECYT5', '0', '1');
INSERT INTO "public"."folios" VALUES ('18', 'GAMCECYT6', '0', '1');
INSERT INTO "public"."folios" VALUES ('19', 'GAMCECYT7', '0', '1');
INSERT INTO "public"."folios" VALUES ('20', 'AZCCECYT8', '0', '1');
INSERT INTO "public"."folios" VALUES ('21', 'MHICECYT9', '0', '1');
INSERT INTO "public"."folios" VALUES ('22', 'GAMCECYT10', '0', '1');
INSERT INTO "public"."folios" VALUES ('23', 'GAMCECYT11', '0', '1');
INSERT INTO "public"."folios" VALUES ('24', 'CUHCECYT12', '0', '1');
INSERT INTO "public"."folios" VALUES ('25', 'COYCECYT13', '0', '1');
INSERT INTO "public"."folios" VALUES ('26', 'VCACECYT14', '0', '1');
INSERT INTO "public"."folios" VALUES ('27', 'AOBIEMS', '0', '1');
INSERT INTO "public"."folios" VALUES ('28', 'AZCIEMS', '0', '1');
INSERT INTO "public"."folios" VALUES ('29', 'COYIEMSRFM', '0', '1');
INSERT INTO "public"."folios" VALUES ('30', 'CUJIEMS', '0', '1');
INSERT INTO "public"."folios" VALUES ('31', 'GAMIEMSBD', '0', '1');
INSERT INTO "public"."folios" VALUES ('32', 'GAMIEMS2', '0', '1');
INSERT INTO "public"."folios" VALUES ('33', 'IZTIEMS', '0', '1');
INSERT INTO "public"."folios" VALUES ('34', 'IZPIEMS1', '0', '1');
INSERT INTO "public"."folios" VALUES ('35', 'IZPIEMS2', '0', '1');
INSERT INTO "public"."folios" VALUES ('36', 'MACIEMS', '0', '1');
INSERT INTO "public"."folios" VALUES ('37', 'MHIIEMSCS', '4', '1');
INSERT INTO "public"."folios" VALUES ('38', 'MILIEMS', '0', '1');
INSERT INTO "public"."folios" VALUES ('39', 'TLHIEMS', '0', '1');
INSERT INTO "public"."folios" VALUES ('40', 'TLPIEMS1', '5', '1');
INSERT INTO "public"."folios" VALUES ('41', 'TLPIEMS2', '0', '1');
INSERT INTO "public"."folios" VALUES ('42', 'XOCIEMS', '0', '1');
INSERT INTO "public"."folios" VALUES ('43', 'MHIDGBMSG', '0', '1');
INSERT INTO "public"."folios" VALUES ('44', 'COYDGB', '0', '1');
INSERT INTO "public"."folios" VALUES ('45', 'AZCCB1', '0', '1');
INSERT INTO "public"."folios" VALUES ('46', 'GAMCB2', '3', '1');
INSERT INTO "public"."folios" VALUES ('47', 'IZTCB3', '0', '1');
INSERT INTO "public"."folios" VALUES ('48', 'COYCB4', '0', '1');
INSERT INTO "public"."folios" VALUES ('49', 'IZPCB6', '0', '1');
INSERT INTO "public"."folios" VALUES ('50', 'IZPCB7', '0', '1');
INSERT INTO "public"."folios" VALUES ('51', 'CUJCB8', '0', '1');
INSERT INTO "public"."folios" VALUES ('52', 'GAMCB9', '0', '1');
INSERT INTO "public"."folios" VALUES ('53', 'VCACB10', '0', '1');
INSERT INTO "public"."folios" VALUES ('54', 'XOCCB13', '0', '1');
INSERT INTO "public"."folios" VALUES ('55', 'MILCB14', '0', '1');
INSERT INTO "public"."folios" VALUES ('56', 'MACCB15', '0', '1');
INSERT INTO "public"."folios" VALUES ('57', 'TLHCB16', '0', '1');
INSERT INTO "public"."folios" VALUES ('58', 'COYCB17', '0', '1');
INSERT INTO "public"."folios" VALUES ('60', 'TLHCET1', '0', '1');
INSERT INTO "public"."folios" VALUES ('61', 'COYCET2', '0', '1');
INSERT INTO "public"."folios" VALUES ('62', 'CUHCET3', '0', '1');
INSERT INTO "public"."folios" VALUES ('63', 'AZCCET4', '0', '1');
INSERT INTO "public"."folios" VALUES ('64', 'AZCCET5', '0', '1');
INSERT INTO "public"."folios" VALUES ('65', 'IZPCET6', '0', '1');
INSERT INTO "public"."folios" VALUES ('66', 'GAMCET7', '1', '1');
INSERT INTO "public"."folios" VALUES ('67', 'MHICET8', '0', '1');
INSERT INTO "public"."folios" VALUES ('68', 'CUHCET9', '0', '1');
INSERT INTO "public"."folios" VALUES ('69', 'AOBCET10', '0', '1');
INSERT INTO "public"."folios" VALUES ('70', 'CUHCET11', '0', '1');
INSERT INTO "public"."folios" VALUES ('71', 'CUHCET13', '0', '1');
INSERT INTO "public"."folios" VALUES ('72', 'CUJCET29', '0', '1');
INSERT INTO "public"."folios" VALUES ('73', 'GAMCET30', '0', '1');
INSERT INTO "public"."folios" VALUES ('74', 'IZTCET31', '0', '1');
INSERT INTO "public"."folios" VALUES ('75', 'VCACET32', '0', '1');
INSERT INTO "public"."folios" VALUES ('76', 'AZCCET33', '0', '1');
INSERT INTO "public"."folios" VALUES ('77', 'XOCCET39', '0', '1');
INSERT INTO "public"."folios" VALUES ('79', 'XOCCET49', '0', '1');
INSERT INTO "public"."folios" VALUES ('80', 'IZPCET50', '0', '1');
INSERT INTO "public"."folios" VALUES ('81', 'VCACET51', '0', '1');
INSERT INTO "public"."folios" VALUES ('82', 'AOBCET52', '0', '1');
INSERT INTO "public"."folios" VALUES ('83', 'IZPCET53', '0', '1');
INSERT INTO "public"."folios" VALUES ('84', 'GAMCET54', '0', '1');
INSERT INTO "public"."folios" VALUES ('85', 'GAMCET55', '0', '1');
INSERT INTO "public"."folios" VALUES ('86', 'GAMCET56', '20', '1');
INSERT INTO "public"."folios" VALUES ('87', 'IZPCET57', '0', '1');
INSERT INTO "public"."folios" VALUES ('88', 'IZTCET76', '0', '1');
INSERT INTO "public"."folios" VALUES ('89', 'MHICET152', '0', '1');
INSERT INTO "public"."folios" VALUES ('90', 'IZPCET153', '0', '1');
INSERT INTO "public"."folios" VALUES ('91', 'TLPCET154', '0', '1');
INSERT INTO "public"."folios" VALUES ('92', 'GAMCET166', '0', '1');
INSERT INTO "public"."folios" VALUES ('93', 'MILCET167', '0', '1');
INSERT INTO "public"."folios" VALUES ('94', 'VCACONALEPA', '0', '1');
INSERT INTO "public"."folios" VALUES ('95', 'AOBCONALEP1', '0', '1');
INSERT INTO "public"."folios" VALUES ('96', 'AOBCONALEP2', '0', '1');
INSERT INTO "public"."folios" VALUES ('97', 'GAMCONALEPA', '0', '1');
INSERT INTO "public"."folios" VALUES ('98', 'AZCCONALEPA', '0', '1');
INSERT INTO "public"."folios" VALUES ('99', 'IZPCONALEP', '0', '1');
INSERT INTO "public"."folios" VALUES ('100', 'COYCONALEP', '0', '1');
INSERT INTO "public"."folios" VALUES ('101', 'GAMCONALEP1', '0', '1');
INSERT INTO "public"."folios" VALUES ('102', 'GAMCONALEP2', '0', '1');
INSERT INTO "public"."folios" VALUES ('103', 'ITZCONALEP1', '0', '1');
INSERT INTO "public"."folios" VALUES ('104', 'IZPCONALEP1', '0', '1');
INSERT INTO "public"."folios" VALUES ('105', 'IZPCONALEP2', '0', '1');
INSERT INTO "public"."folios" VALUES ('106', 'IZPCONALEP3', '0', '1');
INSERT INTO "public"."folios" VALUES ('107', 'IZPCONALEP4', '0', '1');
INSERT INTO "public"."folios" VALUES ('108', 'IZPCONALEP5', '0', '1');
INSERT INTO "public"."folios" VALUES ('109', 'MACCONALEPP', '0', '1');
INSERT INTO "public"."folios" VALUES ('110', 'AZCCONALEPMC', '0', '1');
INSERT INTO "public"."folios" VALUES ('111', 'MILCONALEP', '0', '1');
INSERT INTO "public"."folios" VALUES ('112', 'CUJCONALEPSF', '0', '1');
INSERT INTO "public"."folios" VALUES ('113', 'MACSECOFI', '0', '1');
INSERT INTO "public"."folios" VALUES ('114', 'GAMCONALEP3', '0', '1');
INSERT INTO "public"."folios" VALUES ('115', 'TLHCONALEP', '0', '1');
INSERT INTO "public"."folios" VALUES ('116', 'TLPCONALEP1', '53', '1');
INSERT INTO "public"."folios" VALUES ('117', 'TLPCONALEP2', '0', '1');
INSERT INTO "public"."folios" VALUES ('118', 'VCACONALEP1', '0', '1');
INSERT INTO "public"."folios" VALUES ('119', 'VCACONALEP2', '0', '1');
INSERT INTO "public"."folios" VALUES ('120', 'XOCCONALEP', '0', '1');
INSERT INTO "public"."folios" VALUES ('121', 'CUHBAD', '0', '1');
INSERT INTO "public"."folios" VALUES ('123', 'AZCCB18', '0', '1');
INSERT INTO "public"."folios" VALUES ('124', 'AZCCB20', '0', '1');
INSERT INTO "public"."folios" VALUES ('125', 'MILCECYT15', '0', '1');
INSERT INTO "public"."folios" VALUES ('126', 'GAMCET', '0', '1');
INSERT INTO "public"."folios" VALUES ('127', 'GAMCB11', '0', '1');
INSERT INTO "public"."folios" VALUES ('128', 'IZPCET42', '0', '1');
INSERT INTO "public"."folios" VALUES ('129', 'CUHCEDARTLSS', '0', '1');
INSERT INTO "public"."folios" VALUES ('130', 'COYCEDART', '0', '1');
INSERT INTO "public"."folios" VALUES ('131', 'VCAIEMS', '0', '1');
INSERT INTO "public"."folios" VALUES ('132', 'CUHCEDARTFK', '0', '1');
INSERT INTO "public"."folios" VALUES ('133', 'COYENDCC', '0', '1');
INSERT INTO "public"."folios" VALUES ('134', 'COYINBAADM', '0', '1');
INSERT INTO "public"."folios" VALUES ('135', '0', '0', '1');
INSERT INTO "public"."folios" VALUES ('136', 'COYPA', '0', '1');
INSERT INTO "public"."folios" VALUES ('137', 'IZTCNAR', '0', '1');
INSERT INTO "public"."folios" VALUES ('138', '0', '0', '1');
INSERT INTO "public"."folios" VALUES ('139', '0', '0', '1');
INSERT INTO "public"."folios" VALUES ('150', 'MILITF', '0', '1');
INSERT INTO "public"."folios" VALUES ('151', 'TLHITF', '0', '1');
INSERT INTO "public"."folios" VALUES ('152', 'AZCUAM', '0', '1');
INSERT INTO "public"."folios" VALUES ('153', 'ITPUAM', '0', '1');
INSERT INTO "public"."folios" VALUES ('154', 'XOCUAM', '0', '1');
INSERT INTO "public"."folios" VALUES ('155', 'CUJUAM', '0', '1');
INSERT INTO "public"."folios" VALUES ('157', 'MILCICS', '0', '1');
INSERT INTO "public"."folios" VALUES ('158', 'MHIIPNCICSST', '0', '1');
INSERT INTO "public"."folios" VALUES ('160', 'MHIIPNENCB', '0', '1');
INSERT INTO "public"."folios" VALUES ('161', 'GAMENMH', '0', '1');
INSERT INTO "public"."folios" VALUES ('162', 'GAMIPNESCAST', '0', '1');
INSERT INTO "public"."folios" VALUES ('163', 'MHIIPNESCAT', '0', '1');
INSERT INTO "public"."folios" VALUES ('164', 'GAMIPNESCOM', '0', '1');
INSERT INTO "public"."folios" VALUES ('165', 'MHIIPNESE', '0', '1');
INSERT INTO "public"."folios" VALUES ('166', 'MHIIPNESEO', '0', '1');
INSERT INTO "public"."folios" VALUES ('167', 'GAMIPNESFM', '0', '1');
INSERT INTO "public"."folios" VALUES ('169', 'GAMIPNESIAT', '0', '1');
INSERT INTO "public"."folios" VALUES ('171', 'GAMIPNESIAZ', '0', '1');
INSERT INTO "public"."folios" VALUES ('172', 'AZCIPNESIME', '0', '1');
INSERT INTO "public"."folios" VALUES ('173', 'COYIPNESIME', '0', '1');
INSERT INTO "public"."folios" VALUES ('175', 'GAMIPNESIMET', '0', '1');
INSERT INTO "public"."folios" VALUES ('176', 'GAMIPNESIMEZ', '0', '1');
INSERT INTO "public"."folios" VALUES ('177', 'GAMIPNESIQIE', '0', '1');
INSERT INTO "public"."folios" VALUES ('178', 'GAMIPNESIT', '0', '1');
INSERT INTO "public"."folios" VALUES ('179', 'MHIIPNESM', '0', '1');
INSERT INTO "public"."folios" VALUES ('180', 'GAMIPNEST', '0', '1');
INSERT INTO "public"."folios" VALUES ('181', 'GAMIPNUPIBI', '0', '1');
INSERT INTO "public"."folios" VALUES ('182', 'IZTINPUPIICSA', '0', '1');
INSERT INTO "public"."folios" VALUES ('183', 'GAMIPNUPIITA', '0', '1');
INSERT INTO "public"."folios" VALUES ('184', '0', '0', '1');
INSERT INTO "public"."folios" VALUES ('185', '0', '0', '1');
INSERT INTO "public"."folios" VALUES ('186', '0', '0', '1');
INSERT INTO "public"."folios" VALUES ('187', '0', '0', '1');
INSERT INTO "public"."folios" VALUES ('188', 'CUHUNAMENAP', '0', '1');
INSERT INTO "public"."folios" VALUES ('189', 'TLPUNAMENEO', '0', '1');
INSERT INTO "public"."folios" VALUES ('190', 'COYUNAMENM', '0', '1');
INSERT INTO "public"."folios" VALUES ('191', 'COYUNAMENTS', '0', '1');
INSERT INTO "public"."folios" VALUES ('192', 'COYUNAMFA', '0', '1');
INSERT INTO "public"."folios" VALUES ('193', 'COYUNAMFC', '0', '1');
INSERT INTO "public"."folios" VALUES ('194', 'COYUNAMFCPS', '0', '1');
INSERT INTO "public"."folios" VALUES ('195', 'COYUNAMFCA', '0', '1');
INSERT INTO "public"."folios" VALUES ('196', 'COYUNAMFD', '0', '1');
INSERT INTO "public"."folios" VALUES ('197', 'COYUNAMFE', '0', '1');
INSERT INTO "public"."folios" VALUES ('198', '0', '0', '1');
INSERT INTO "public"."folios" VALUES ('199', '0', '0', '1');
INSERT INTO "public"."folios" VALUES ('200', '0', '0', '1');
INSERT INTO "public"."folios" VALUES ('201', '0', '0', '1');
INSERT INTO "public"."folios" VALUES ('202', 'IZPUNAMFESZ', '0', '1');
INSERT INTO "public"."folios" VALUES ('203', 'COYUNAMFL', '0', '1');
INSERT INTO "public"."folios" VALUES ('204', 'COYUNAMFI', '0', '1');
INSERT INTO "public"."folios" VALUES ('205', 'CONYUNAMFM', '0', '1');
INSERT INTO "public"."folios" VALUES ('206', 'COYUNAMFMVZ', '0', '1');
INSERT INTO "public"."folios" VALUES ('207', 'COYUNAMFO', '0', '1');
INSERT INTO "public"."folios" VALUES ('208', 'COYUNAMFP', '0', '1');
INSERT INTO "public"."folios" VALUES ('209', 'COYUNAMFQ', '0', '1');
INSERT INTO "public"."folios" VALUES ('210', '0', '0', '1');
INSERT INTO "public"."folios" VALUES ('211', 'IZPITF', '0', '1');
INSERT INTO "public"."folios" VALUES ('216', 'COYUNAMIIB', '0', '1');
INSERT INTO "public"."folios" VALUES ('217', 'IZPUACMCL', '0', '1');
INSERT INTO "public"."folios" VALUES ('218', 'CUHUACM', '0', '1');
INSERT INTO "public"."folios" VALUES ('219', 'GAMUACM', '0', '1');
INSERT INTO "public"."folios" VALUES ('220', 'AZCUACM', '0', '1');
INSERT INTO "public"."folios" VALUES ('221', 'IZPUACMSLT', '0', '1');
INSERT INTO "public"."folios" VALUES ('222', 'TLPCEI', '0', '1');
INSERT INTO "public"."folios" VALUES ('223', 'TLPENAH', '0', '1');
INSERT INTO "public"."folios" VALUES ('224', 'COYENCRYM', '0', '1');
INSERT INTO "public"."folios" VALUES ('225', 'TLPUPNA', '0', '1');
INSERT INTO "public"."folios" VALUES ('227', 'GAMITF', '0', '1');
INSERT INTO "public"."folios" VALUES ('228', 'IZPITF2', '0', '1');
INSERT INTO "public"."folios" VALUES ('229', 'IZPITF3', '0', '1');
INSERT INTO "public"."folios" VALUES ('230', 'TLPENPEG', '0', '1');
INSERT INTO "public"."folios" VALUES ('231', 'CUHINBAED', '0', '1');
INSERT INTO "public"."folios" VALUES ('232', '0', '0', '1');
INSERT INTO "public"."folios" VALUES ('233', 'COYINBAENDCC', '0', '1');
INSERT INTO "public"."folios" VALUES ('234', 'MHIINBAENDF', '0', '1');
INSERT INTO "public"."folios" VALUES ('235', 'MHIENDNG', '0', '1');
INSERT INTO "public"."folios" VALUES ('236', 'COYESM', '0', '1');
INSERT INTO "public"."folios" VALUES ('237', 'MHICNM', '0', '1');
INSERT INTO "public"."folios" VALUES ('238', '0', '0', '1');
INSERT INTO "public"."folios" VALUES ('239', 'COYENAT', '0', '1');
INSERT INTO "public"."folios" VALUES ('240', 'GAMENBA', '0', '1');
INSERT INTO "public"."folios" VALUES ('241', 'IZTESEF', '0', '1');
INSERT INTO "public"."folios" VALUES ('242', 'MHIENE', '0', '1');
INSERT INTO "public"."folios" VALUES ('243', '0', '0', '1');
INSERT INTO "public"."folios" VALUES ('244', 'TLHIT2', '0', '1');
INSERT INTO "public"."folios" VALUES ('245', 'TLHITF3', '0', '1');
INSERT INTO "public"."folios" VALUES ('246', 'MHIBENM', '0', '1');
INSERT INTO "public"."folios" VALUES ('247', 'IZTIEMS3', '0', '1');
INSERT INTO "public"."folios" VALUES ('248', 'MHIENE', '0', '1');
INSERT INTO "public"."folios" VALUES ('249', 'MHISEDESA', '0', '1');
INSERT INTO "public"."folios" VALUES ('250', 'MACEFXXI', '0', '1');
INSERT INTO "public"."folios" VALUES ('251', 'IZTENED', '0', '1');
INSERT INTO "public"."folios" VALUES ('252', 'TLPESR', '0', '1');
INSERT INTO "public"."folios" VALUES ('257', 'CUHUNAD', '0', '1');
INSERT INTO "public"."folios" VALUES ('258', 'AOBIT', '0', '1');
INSERT INTO "public"."folios" VALUES ('259', 'TLPIT', '0', '1');

-- ----------------------------
-- Alter Sequences Owned By 
-- ----------------------------
