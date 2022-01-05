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

CREATE TABLE ingredientes (
    ing_id int NOT NULL AUTO_INCREMENT,
    ing_nome varchar(50) NOT NULL,
    ing_quantidade float NOT NULL,
    ing_unidade varchar(15) NOT NULL,
    PRIMARY KEY (ing_id)
);

CREATE TABLE produtos (
    pro_id int NOT NULL AUTO_INCREMENT,
    pro_nome varchar(50) NOT NULL,
    pro_imagem varchar(255) NOT NULL,
    pro_preco float NOT NULL,
    pro_disponivel boolean NOT NULL,
    PRIMARY KEY (pro_id)
);

CREATE TABLE produtosIngredientes (
    pro_id int,
    ing_id int,
    proIng_quantidade float NOT NULL,
    PRIMARY KEY (pro_id, ing_id),
    CONSTRAINT FK_pro_proIng FOREIGN KEY (pro_id)
        REFERENCES produtos(pro_id)
        ON DELETE CASCADE,
    CONSTRAINT FK_ing_proIng FOREIGN KEY (ing_id)
        REFERENCES ingredientes(ing_id)
);

CREATE TABLE pedidos (
    ped_id int NOT NULL AUTO_INCREMENT,
    cli_id int,
    fun_id int,
    mes_id int,
    ped_tipo boolean NOT NULL,
    ped_receptor varchar(50),
    ped_data datetime NOT NULL,
    ped_endereco varchar(50),
    ped_cidade varchar(40),
    ped_cep varchar(8),
    ped_celular varchar(11),
    status int NOT NULL,
    ped_total float NOT NULL,
    PRIMARY KEY (ped_id),
    CONSTRAINT FK_cli_ped FOREIGN KEY (cli_id)
    REFERENCES clientes(cli_id),
    CONSTRAINT FK_fun_ped FOREIGN KEY (fun_id)
    REFERENCES funcionarios(fun_id)
);

CREATE TABLE pedidosProdutos (
    ped_id int,
    pro_id int,
    pedPro_quantidade int,
    CONSTRAINT FK_ped_pedPro FOREIGN KEY (ped_id)
    REFERENCES pedidos(ped_id)
        ON DELETE CASCADE,
    CONSTRAINT FK_pro_pedPro FOREIGN KEY (pro_id)
    REFERENCES produtos(pro_id),
    PRIMARY KEY (ped_id, pro_id)
);

CREATE TABLE carrossel (
    itm_id int NOT NULL AUTO_INCREMENT,
    itm_titulo varchar(255) NOT NULL,
    itm_descricao text NOT NULL,
    itm_img varchar(255) NOT NULL,
    PRIMARY KEY (itm_id)
);
