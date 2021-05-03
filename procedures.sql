# USUÁRIOS #
DELIMITER $$
CREATE PROCEDURE `sp_inserir_novo_usuario`(IN `pnome` VARCHAR(155) CHARSET utf8, IN `pdatanascimento` DATE, IN `pemail` VARCHAR(155) CHARSET utf8, IN `pdocumento` VARCHAR(25) CHARSET utf8, IN `pcelular` VARCHAR(25) CHARSET utf8, IN `pusuario` VARCHAR(25) CHARSET utf8, IN `psenha` VARCHAR(25) CHARSET utf8, IN `pstatus` INT)
BEGIN
IF((SELECT COUNT(`idusuario`) AS total FROM `usuarios` WHERE CAST(AES_DECRYPT(`nome`,'procon1234') AS char(255)) = `pnome` AND CAST(AES_DECRYPT(`documento`,'procon1234') AS char(255)) = `pdocumento` AND CAST(AES_DECRYPT(`celular`,'procon1234') AS char(255)) = `pcelular` AND CAST(AES_DECRYPT(`email`,'procon1234') AS char(255))=`pemail`) = 0) THEN
	INSERT INTO `usuarios`
			(	`nome`,
				`datanascimento`,
				`email`,
				`documento`,
				`celular`,
				`usuario`,
				`senha`,
                `status`)
	VALUES 	(
    			`pnome`,
    			`pdatanascimento`,
		       	`pemail`,
		        `pdocumento`,
		        `pcelular`,
		        `pusuario`,
		        `psenha`,
                `pstatus`
			);
END IF;
UPDATE `usuarios`
SET `nome`= AES_ENCRYPT(`nome`,'procon1234'),
    `email`= AES_ENCRYPT(`email`,'procon1234'),
    `documento`= AES_ENCRYPT(`documento`,'procon1234'),
    `celular`= AES_ENCRYPT(`celular`,'procon1234'),
    `usuario`= AES_ENCRYPT(`usuario`,'procon1234'),
    `senha`= AES_ENCRYPT(`senha`,'procon1234')
WHERE idusuario = last_insert_id();

END$$
DELIMITER ;

#############################################################################################################

DELIMITER $$
CREATE PROCEDURE `sp_alterar_usuario`(IN `pidusuario` INT, IN `pgrupo` INT, IN `pcargo` INT, IN `psetor` INT)
BEGIN
	UPDATE `usuarios` SET `grupo`=`pgrupo`, `cargo`=`pcargo`, `setor`=`psetor` WHERE `idusuario` = `pidusuario`;
END$$
DELIMITER ;
# USUÁRIOS #

# CARGOS#
DELIMITER $$
CREATE PROCEDURE `sp_novo_cargo`(IN `pnomecargo` VARCHAR(255))
BEGIN
IF(pnomecargo !='') THEN
	INSERT INTO cargos (nomecargo) VALUES (pnomecargo);
END IF;
END$$
DELIMITER ;

##############################################################################################################

DELIMITER $$
CREATE PROCEDURE `sp_excluir_cargo`(IN `pidcargo` INT)
BEGIN
	DELETE FROM `cargos` WHERE idcargo = pidcargo;
END$$
DELIMITER ;
#CARGOS#

#GRUPOS#
DELIMITER $$
CREATE PROCEDURE `sp_novo_grupo`(IN `pnomegrupo` VARCHAR(255))
BEGIN
IF(pnomegrupo !='') THEN
	INSERT INTO grupos (nomegrupo) VALUES (pnomegrupo);
END IF;
END$$
DELIMITER ;

#################################################################################################################

DELIMITER $$
CREATE PROCEDURE `sp_excluir_grupo`(IN `pidgrupo` INT)
BEGIN
	DELETE FROM `grupos` WHERE idgrupo = pidgrupo;
END$$
DELIMITER ;
#GRUPOS#

# PERMISSÕES #
DELIMITER $$
CREATE PROCEDURE `sp_nova_permissao`(IN `pidgrupo` INT, IN `pnomegrupo` VARCHAR(255), IN `pcontrole` INT )
BEGIN
IF(pcontrole = 1) THEN
	IF((SELECT COUNT(`idpermisao`) AS total FROM `permissao_gestao` WHERE `grupoidpermissao` = `pidgrupo`) = 0) THEN
	INSERT INTO `permissao_gestao`(`grupoidpermissao`, `grupopermisao`) VALUES (`pidgrupo`, `pnomegrupo`);
    END IF;
END IF;
IF(pcontrole = 2) THEN
	IF((SELECT COUNT(`idpermisao`) AS total FROM `permissao_atendimento` WHERE `grupoidpermissao` = `pidgrupo`) = 0) THEN
	INSERT INTO `permissao_atendimento`(`grupoidpermissao`, `grupopermisao`) VALUES (`pidgrupo`, `pnomegrupo`);
    END IF;
END IF;
IF(pcontrole = 3) THEN
	IF((SELECT COUNT(`idpermisao`) AS total FROM `permissao_audiencia` WHERE `grupoidpermissao` = `pidgrupo`) = 0) THEN
	INSERT INTO `permissao_audiencia`(`grupoidpermissao`, `grupopermisao`) VALUES (`pidgrupo`, `pnomegrupo`);
    END IF;
END IF;
IF(pcontrole = 4) THEN
	IF((SELECT COUNT(`idpermisao`) AS total FROM `permissao_fiscalizacao` WHERE `grupoidpermissao` = `pidgrupo`) = 0) THEN
	INSERT INTO `permissao_fiscalizacao`(`grupoidpermissao`, `grupopermisao`) VALUES (`pidgrupo`, `pnomegrupo`);
    END IF;
END IF;
IF(pcontrole = 5) THEN
	IF((SELECT COUNT(`idpermisao`) AS total FROM `permissao_administrativo` WHERE `grupoidpermissao` = `pidgrupo`) = 0) THEN
	INSERT INTO `permissao_administrativo`(`grupoidpermissao`, `grupopermisao`) VALUES (`pidgrupo`, `pnomegrupo`);
    END IF;
END IF;
IF(pcontrole = 6) THEN
	IF((SELECT COUNT(`idpermisao`) AS total FROM `permissao_coordenacao` WHERE `grupoidpermissao` = `pidgrupo`) = 0) THEN
	INSERT INTO `permissao_coordenacao`(`grupoidpermissao`, `grupopermisao`) VALUES (`pidgrupo`, `pnomegrupo`);
    END IF;
END IF;
END$$
DELIMITER ;

####################################################################################################################################

DELIMITER $$
CREATE PROCEDURE `sp_excluir_permissao`(IN `pidgrupo` INT, IN `pnomegrupo` VARCHAR(255), IN `pcontrole` INT )
BEGIN
IF(pcontrole = 1) THEN
	DELETE FROM `permissao_gestao` WHERE `grupoidpermissao` = `pidgrupo`;
END IF;
IF(pcontrole = 2) THEN
	DELETE FROM `permissao_atendimento` WHERE `grupoidpermissao` = `pidgrupo`;
END IF;
IF(pcontrole = 3) THEN
	DELETE FROM `permissao_audiencia` WHERE `grupoidpermissao` = `pidgrupo`;
END IF;
IF(pcontrole = 4) THEN
	DELETE FROM `permissao_fiscalizacao` WHERE `grupoidpermissao` = `pidgrupo`;
END IF;
IF(pcontrole = 5) THEN
	DELETE FROM `permissao_administrativo` WHERE `grupoidpermissao` = `pidgrupo`;
END IF;
IF(pcontrole = 6) THEN
	DELETE FROM `permissao_coordenacao` WHERE `grupoidpermissao` = `pidgrupo`;
END IF;
END$$
DELIMITER ;
# PERMISSÕES #


# STATIS USUARIO #
DELIMITER $$
CREATE PROCEDURE `sp_alterar_status`(IN `pidusuario` INT, IN `pstatus` INT)
BEGIN
	UPDATE `usuarios` SET `status`=`pstatus` WHERE `idusuario` = `pidusuario`;
END$$
DELIMITER ;


##############################################################################################################
# PROCEDURES PROTOCOLO
##############################################################################################################

# DOCUMENTO #
DELIMITER $$
CREATE PROCEDURE `sp_protocolo_documento_novo`(
												IN ptipo_documento	INT,
												IN pnum_documento	VARCHAR(125) CHARSET utf8,
												IN plocal_origem		INT,
												IN preferencia		INT,
												IN pcadastrante		INT
)
BEGIN
	INSERT INTO `documentos_protocolo`(
										`tipo_documento`,
										`num_documento`,
										`local_origem`,
										`referencia`,
										`cadastrante`)
	VALUES (
			ptipo_documento
			pnum_documento
			plocal_origem
			preferencia
			pcadastrante);
END$$
DELIMITER ;


# PROTOCOLO #
DELIMITER $$
CREATE PROCEDURE `sp_protocolo_documento_protocolo_novo`(
															IN pdocumento_id		INT
															IN plocal_encaminhado	INT
															IN pnota				TEXT	CHARSET utf8,
															IN pcadastrante			INT
)
BEGIN
	INSERT INTO `entrada_protocolo`(`documento_id`, `local_encaminhado`, `nota`, `cadastrante`)
	VALUES (pdocumento_id,plocal_encaminhado,pnota,pcadastrante);
END$$
DELIMITER ;


DELIMITER $$
CREATE PROCEDURE `sp_protocolo_saida`(IN `pdocumento_id` INT, IN `pid_entrada` INT, IN `plocal_destino` INT, IN `saida_nota` TEXT CHARSET utf8, IN `pcadastrante` INT)
BEGIN
	INSERT INTO `saida_protocolo`(`id_entrada`,`documento_id`, `local_destino`, `saida_status`, `saida_nota`, `cadastrante`)
	VALUES (pid_entrada, pdocumento_id, plocal_destino, '1', psaida_nota ,pcadastrante);
END$$
DELIMITER ;

BEGIN
	INSERT INTO `saida_protocolo`(`id_entrada`,`documento_id`, `local_destino`, `saida_status`, `saida_nota`, `cadastrante`)
	VALUES (pid_entrada, pdocumento_id, plocal_destino, 1, psaida_nota ,pcadastrante);
	UPDATE `saida_protocolo`
	SET `saida_status`= 0
	WHERE `saida_id` != last_insert_id() AND `documento_id` = pdocumento_id;
    INSERT INTO `entrada_protocolo`(`documento_id`,`local_origem`, `local_destino`,`cadastrante`) 
    VALUES (pdocumento_id, (SELECT `local_destino` FROM `entrada_protocolo` WHERE `entrada_id` = pid_entrada), plocal_destino, pcadastrante);
END


CREATE DEFINER=`semas`@`%` PROCEDURE `sp_protocolo_saida`(IN `pid_entrada` INT,  IN `pdocumento_id` INT, IN `plocal_destino` INT, IN `psaida_nota` TEXT CHARSET utf8, IN `pcadastrante` INT)
BEGIN
#=================================================================#
CREATE PROCEDURE `sp_cadastro_beneficio`(
	IN nis		VARBINARY(255),
	IN nome 	VARBINARY(255),
	IN cpf 	VARBINARY(255),
	IN email	VARBINARY(255),
	IN telefone	VARBINARY(255),
	IN cep		VARCHAR(30) CHARSET UTF8,
	IN bairro	VARCHAR(150) CHARSET UTF8,
	IN cidade	VARCHAR(80) CHARSET UTF8,
	IN renda	INT(11),
	IN pessoas	INT(11),
	IN termo	INT(11))
BEGIN

INSERT INTO `beneficio_municipal`
						(`nis`,
                         `nome`,
                         `cpf`,
                         `email`,
                         `telefone`,
                         `cep`,
                         `endereco`,
                         `bairro`,
                         `cidade`, `pessoas`,
                         `renda`,
                         `termo`)
VALUES
                         (`pnis`,
                         `pnome`,
                         `pcpf`,
                         `pemail`,
                         `telefone`,
                         `pcep`,
                         `pendereco`,
                         `pbairro`,
                         `pcidade`, `pessoas`,
                         `prenda`,
                         `ptermo`);

UPDATE `beneficio_municipal`
SET `nis`= AES_ENCRYPT(`nis`,'SeMaS2)2!'),
	`nome`= AES_ENCRYPT(`nome`,'SeMaS2)2!'),
    `email`= AES_ENCRYPT(`email`,'SeMaS2)2!'),
    `cpf`= AES_ENCRYPT(`cpf`,'SeMaS2)2!'),
    `telefone`= AES_ENCRYPT(`telefone`,'SeMaS2)2!')
WHERE id_cadastro = last_insert_id();
END

CREATE PROCEDURE `sp_cadastro_beneficio`(IN pnis VARBINARY(255), IN pnome VARBINARY(255), IN pcpf VARBINARY(255), IN pemail VARBINARY(255), IN ptelefone VARBINARY(255), IN pcep VARCHAR(30) CHARSET UTF8, IN pbairro VARCHAR(150) CHARSET UTF8, IN pcidade	VARCHAR(80) CHARSET UTF8, IN prenda	INT(11), IN ppessoas INT(11), IN ptermo	INT(11))
BEGIN
INSERT INTO `beneficio_negado` (`nome`, `nis`, `cpf`, `motivo`) VALUES(`pnome`, `pnis`, `pcpf`, (SELECT @retorno;));
UPDATE `beneficio_negado` SET `nome`= AES_ENCRYPT(`nome`,'SeMaS2)2!'), `nis`= AES_ENCRYPT(`nis`,'SeMaS2)2!'), `cpf`= AES_ENCRYPT(`cpf`,'SeMaS2)2!')
WHERE id_registro = last_insert_id();
END


INSERT INTO `beneficio_municipal` (`nis`, `nome`, `cpf`, `email`, `telefone`, `cep`, `endereco`, `bairro`, `cidade`, `pessoas`, `renda`, `termo`) VALUES(`pnis`, `pnome`, `pcpf`, `pemail`, `ptelefone`, `pcep`, `pendereco`, `pbairro`, `pcidade`, `ppessoas`, `prenda`, `ptermo`);
END IF;

UPDATE `beneficio_municipal` SET `nis`= AES_ENCRYPT(`nis`,'semas2021'),`nome`= AES_ENCRYPT(`nome`,'semas2021'),`cpf`= AES_ENCRYPT(`cpf`,'semas2021'),`email`= AES_ENCRYPT(`email`,'semas2021'),`telefone`= AES_ENCRYPT(`telefone`,'semas2021') WHERE id_cadastro = last_insert_id();