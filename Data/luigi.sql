DROP DATABASE IF EXISTS luigi;
CREATE DATABASE luigi;

CREATE TABLE clientes (
    cli_id int NOT NULL AUTO_INCREMENT,
    cli_nome varchar(50) NOT NULL,
    cli_email varchar(50) NOT NULL UNIQUE,
    cli_senha varchar(255) NOT NULL,
    PRIMARY KEY (cli_id)
);

CREATE TABLE funcionarios (
    fun_id int NOT NULL AUTO_INCREMENT,
    fun_nome varchar(50) NOT NULL,
    fun_email varchar(50) NOT NULL UNIQUE,
    fun_senha varchar(255) NOT NULL,
    fun_funcao varchar(50) NOT NULL,
    fun_endereco varchar(50) NOT NULL,
    fun_cidade varchar(40) NOT NULL,
    fun_cep varchar(8) NOT NULL,
    fun_celular varchar(11) NOT NULL,
    PRIMARY KEY (fun_id)
);

CREATE TABLE mesas (
    mes_id int NOT NULL AUTO_INCREMENT,
    fun_id int,
    PRIMARY KEY (mes_id),
    CONSTRAINT FK_fun_mes FOREIGN KEY (fun_id)
    REFERENCES funcionarios(fun_id)
);

CREATE TABLE ingredientes (
    ing_id int NOT NULL AUTO_INCREMENT,
    ing_nome varchar(50) NOT NULL,
    ing_quantidade int NOT NULL,
    ing_unidade varchar(15) NOT NULL,
    PRIMARY KEY (ing_id)
);

CREATE TABLE produtos (
    pro_id int NOT NULL AUTO_INCREMENT,
    prod_img MEDIUMBLOB,
    pro_descricao varchar(50) NOT NULL,
    pro_tipo boolean NOT NULL,
    pro_preco float NOT NULL,
    pro_tamanho int NOT NULL,
    pro_disponivel boolean NOT NULL,
    PRIMARY KEY (pro_id)
);

CREATE TABLE produtosIngredientes (
    proIng_id int NOT NULL AUTO_INCREMENT,
    pro_id int,
    ing_id int,
    PRIMARY KEY (proIng_id),
    CONSTRAINT FK_pro_proIng FOREIGN KEY (pro_id)
    REFERENCES produtos(pro_id),
    CONSTRAINT FK_ing_proIng FOREIGN KEY (ing_id)
    REFERENCES ingredientes(ing_id)
);

CREATE TABLE pedidos (
    ped_id int NOT NULL AUTO_INCREMENT,
    cli_id int NOT NULL,
    fun_id int,
    mes_id int,
    ped_tipo boolean NOT NULL,
    ped_data datetime NOT NULL,
    ped_endereco varchar(50),
    ped_cidade varchar(40),
    ped_cep varchar(8),
    ped_celular varchar(11),
    status varchar(50) NOT NULL,
    PRIMARY KEY (ped_id),
    CONSTRAINT FK_cli_ped FOREIGN KEY (cli_id)
    REFERENCES clientes(cli_id),
    CONSTRAINT FK_fun_ped FOREIGN KEY (fun_id)
    REFERENCES funcionarios(fun_id),
    CONSTRAINT FK_mes_ped FOREIGN KEY (mes_id)
    REFERENCES mesas(mes_id)
);

CREATE TABLE pedidosProIng (
    pedProIng_id int NOT NULL AUTO_INCREMENT,
    proIng_id int,
    ped_id int,
    pedProIng_quantidade int,
    PRIMARY KEY (pedProIng_id),
    CONSTRAINT FK_proIng_pedProIng FOREIGN KEY (proIng_id)
    REFERENCES produtosIngredientes(proIng_id),
    CONSTRAINT FK_ped_pedProIng FOREIGN KEY (ped_id)
    REFERENCES pedidos(ped_id)
);

CREATE TABLE carrossel (
    itm_id int NOT NULL AUTO_INCREMENT,
    pro_id int,
    itm_img MEDIUMBLOB,
    PRIMARY KEY (itm_id),
    CONSTRAINT FK_pro_car FOREIGN KEY (pro_id)
    REFERENCES produtos(pro_id)
);
