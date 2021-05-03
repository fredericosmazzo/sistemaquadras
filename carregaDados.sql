-- VARIÁVEIS DO CÓDIGO

SET @Dia='2021-04-29';

-- CARREGA O ARQUIVO QUE SERÁ INSERIDO
ALTER TABLE `cacem` DROP `idRegistro`;
LOAD DATA INFILE '/var/www/html/views/admin/dados/cadu.csv' INTO TABLE cacem
FIELDS TERMINATED BY ','
LINES TERMINATED BY '\r\n'
IGNORE 1 LINES;
ALTER TABLE `cacem`  ADD `idRegistro` INT NOT NULL AUTO_INCREMENT  FIRST,  ADD   PRIMARY KEY  (`idRegistro`);

-- CARREGA O ARQUIVO QUE SERÁ INSERIDO2
ALTER TABLE `cacem2` DROP `idRegistro`;
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

-- INSERIR DADOS NA TABELA CONSULTA COM SELECT

INSERT INTO cacemNaoTotal (Numero, Dia, TOTAL, SOMA)
SELECT `Numero`,`Dia`,`TOTAL`, (SUM(`TOTAL`) OVER(ORDER BY `idRegistro`)) AS SOMA FROM cacemNaoGeral;

-- EXCLUIR TABELA TEMPORÁRIA

DROP TABLE cacemNaoGeral;