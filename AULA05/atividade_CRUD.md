# Atividade PostgreSQL — Filmes e Séries


#### 1. Criar uma tabela sobre Filmes e Séries com as colunas ID, nome, duração (minutos) e nota (0 a 10).

```sql
CREATE TABLE filmes(
    id INT GENERATED ALWAYS AS IDENTITY PRIMARY KEY,
    nome VARCHAR(50) NOT NULL,
    duracao INT NOT NULL,
    nota NUMERIC(10,2) NOT NULL
);

INSERT INTO filmes(nome,duracao,nota)
VALUES
('A Odisseia','172','8.5'),
('Homem-Aranha: Um Novo Dia','145','8.2'),
('Projeto Hail Mary','156','8.2'),
('Toy Story 5','102','7.5'),
('Michael','127','7.4'),
('Hoppers','104','7.2'),
('28 Anos Depois: O Templo dos Ossos','109','7.2'),
('Crime 101','104','7.2'),
('O Samurai e o Prisioneiro','147','6.7'),
('Evil Dead: Burn','110','6.6'),
('Disclosure Day','145','6.5'),
('Peaky Blinders: O Homem Imortal','112','6.5'),
('Mortal Kombat II','116','6.4'),
('O Homem do Saco / The Bride!','126','5.6'),
('A Múmia, de Lee Cronin','134','6.2'),
('Mercy','99','6.2'),
('Ready or Not 2: Here I Come','108','6.5'),
('O Filme do Super Mario Galaxy','98','6.3'),
('Wuthering Heights','136','6.1'),
('Scream 7','114','5.5'),
('Patrulha Canina: O Filme do Dino','88','7.8'),
('Obsessão','108','7.8'),
('Velozes e Furiosos 1','106','6.8'),
('O Sobrevivente','133','6.9'),
('A Empregada','131','6.7'),
('F1: O Filme','155','7.7'),
('O Poderoso Chefão','175','9.2'),
('Batman: O Cavaleiro das Trevas','152','9.1'),
('A Lista de Schindler','195','9.0'),
('O Senhor dos Anéis: O Retorno do Rei','201','9.0');
``` 

#### 2. Consultem, após a criação, somente o nome e nota dos filmes (filtro de colunas)  

```sql 
SELECT nome, nota FROM filmes;
```

#### 3. Atualizem a nota de, pelo menos, 5 filmes (filmes que você já viu)
```sql
UPDATE filmes
SET nota = 9.0
WHERE nome = 'Velozes e Furiosos 1';

UPDATE filmes
SET nota = 8.5
WHERE nome = 'F1: O Filme';

UPDATE filmes
SET nota = 9.0
WHERE nome = 'Homem-Aranha: Um Novo Dia';

UPDATE filmes
SET nota = 8.7
WHERE nome = 'O Poderoso Chefão';

UPDATE filmes
SET nota = 8.0
WHERE nome = 'O Filme do Super Mario Galaxy';

-- Para conferir as notas atualizadas:

SELECT nome, nota
FROM filmes;
```
#### 4. Apagar os 5 filmes com avaliação mais baixa

```sql
SELECT nome, nota
FROM filmes
ORDER BY nota ASC;

DELETE FROM filmes
WHERE id IN (
    SELECT id
    FROM filmes
    ORDER BY nota ASC
    LIMIT 5
);

-- Para conferir o resultado final

SELECT nome, nota
FROM filmes
ORDER BY nota DESC;
```