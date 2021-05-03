-- VARIÁVEIS DO CÓDIGO

SET @Dia='2021-04-29';

-- CRIAÇÃO DA TABELA PARA RECEBER O ARQUIVO

CREATE TABLE IF NOT EXISTS cacem (
`numOrigem` varchar(20) DEFAULT NULL,
`numServico` varchar(20) DEFAULT NULL,
`dataChamada` datetime DEFAULT NULL,
`statusChamada` varchar(50) DEFAULT NULL,
`duracaoChamada` varchar(10) DEFAULT NULL,
`cidadeOrigem` varchar(30) DEFAULT NULL,
`estadoOrigem` varchar(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- CARREGA O ARQUIVO QUE SERÁ INSERIDO

LOAD DATA INFILE '/var/www/html/views/admin/dados/cadu.csv' INTO TABLE cacem
FIELDS TERMINATED BY ','
LINES TERMINATED BY '\r\n'
IGNORE 1 LINES;
ALTER TABLE `cacem`  ADD `idRegistro` INT NOT NULL AUTO_INCREMENT  FIRST,  ADD   PRIMARY KEY  (`idRegistro`);

-- CRIAÇÃO DA TABELA PARA RECEBER O ARQUIVO 2

CREATE TABLE IF NOT EXISTS cacem2 (
`numOrigem` varchar(20) DEFAULT NULL,
`numServico` varchar(20) DEFAULT NULL,
`dataChamada` datetime DEFAULT NULL,
`statusChamada` varchar(50) DEFAULT NULL,
`duracaoChamada` varchar(10) DEFAULT NULL,
`cidadeOrigem` varchar(30) DEFAULT NULL,
`estadoOrigem` varchar(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- CARREGA O ARQUIVO QUE SERÁ INSERIDO 2

LOAD DATA INFILE '/var/www/html/views/admin/dados/cadu.csv' INTO TABLE cacem2
FIELDS TERMINATED BY ','
LINES TERMINATED BY '\r\n'
IGNORE 1 LINES;
ALTER TABLE `cacem2`  ADD `idRegistro` INT NOT NULL AUTO_INCREMENT  FIRST,  ADD   PRIMARY KEY  (`idRegistro`);

-- CRIAR A TABELA TEMPORÁRIA

CREATE TABLE `cacemNaoGeral` (
`idRegistro` int(11) NOT NULL,
`Numero` varchar(20) DEFAULT NULL,
`Dia` datetime DEFAULT NULL,
`TOTAL` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
ALTER TABLE `cacemNaoGeral` ADD PRIMARY KEY (`idRegistro`);
ALTER TABLE `cacemNaoGeral` MODIFY `idRegistro` int(11) NOT NULL AUTO_INCREMENT;

-- INSERIR DADOS POR SELECT NA TABELA TEMP

INSERT INTO cacemNaoGeral (Numero, Dia, TOTAL) 
SELECT 
`numOrigem` AS Numero, 
`dataChamada` AS Dia, 
COUNT(`idRegistro`) AS TOTAL FROM `cacem` 
WHERE `numOrigem` NOT IN (SELECT `numOrigem` FROM `cacem` WHERE `statusChamada` LIKE 'OK' GROUP BY `numOrigem`) 
AND DATE_FORMAT(`dataChamada`,'%H:%i:%s') BETWEEN '07:30:00' AND '16:30:00'
AND DATE(`dataChamada`) = @Dia
GROUP BY `numOrigem`
ORDER BY TOTAL DESC;

-- CRIAR A TABELA FINAL DE CONSULTA

CREATE TABLE IF NOT EXISTS `cacemNaoTotal` (
  `idRegistro` int(11) NOT NULL,
  `Numero` varchar(20) DEFAULT NULL,
  `Dia` datetime DEFAULT NULL,
  `TOTAL` int(11) DEFAULT NULL,
  `SOMA` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
ALTER TABLE `cacemNaoTotal` ADD PRIMARY KEY (`idRegistro`);
ALTER TABLE `cacemNaoTotal` MODIFY `idRegistro` int(11) NOT NULL AUTO_INCREMENT;

-- INSERIR DADOS NA TABELA CONSULTA COM SELECT

INSERT INTO cacemNaoTotal (Numero, Dia, TOTAL, SOMA)
SELECT `Numero`,`Dia`,`TOTAL`, (SUM(`TOTAL`) OVER(ORDER BY `idRegistro`)) AS SOMA FROM cacemNaoGeral;

-- EXCLUIR TABELA TEMPORÁRIA

DROP TABLE cacemNaoGeral;