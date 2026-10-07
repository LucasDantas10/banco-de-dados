# ATIVIDADE – JOIN NA BIBLIOTECA DA ESCOLA

#### A biblioteca da escola anota os empréstimos de livros em um caderno, e a bibliotecária não consegue saber com facilidade quem está com cada livro. Vocês vão montar um pequeno banco de dados para ajudar.

1- Criar as tabelas no banco:
Tabela alunos:
```sql
CREATE TABLE alunos(
    id SERIAL PRIMARY KEY,
    nome VARCHAR(50) NOT NULL
);
```
Tabela emprestimos:
```sql
CREATE TABLE emprestimos(
    id SERIAL PRIMARY KEY,
    livro VARCHAR(100) NOT NULL,
    id_aluno INT REFERENCES alunos(id)
);
```

2- Inserindo as informações nas tabelas:
Tabela alunos:
```sql
INSERT INTO alunos(nome) VALUES 
('Lucas'),
('Felipe'),
('Gabriel'),
('Mariana'),
('Beatriz'),
('Rodrigo'),
('Camila'),
('Thiago'),
('Juliana'),
('Bruno'),
('Larissa'),
('Letícia'),
('Rafael'),
('Amanda'),
('Leonardo');
```
Tabela emprestimos:
```sql
INSERT INTO emprestimos(livro,id_aluno) VALUES
('Iracema',14),
('Macunaíma',15),
('Dom Casmurro',11),
('Estorvo',10),
('Budapeste',7),
('Iaiá Garcia',6),
('Torto Arado',4),
('O Quinze',2),
('O Cortiço',1),
('Suor',1);
```

3- Mostre todos os dados de cada tabela(uma consulta para cada):
Tabela alunos:
```sql
SELECT * FROM alunos;
```
Tabela emprestimos:
```sql
SELECT * FROM emprestimos;
```

4- Usando INNER JOIN, mostre o nome do aluno e o livro que ele pegou.
   Responda: quais alunos NÃO apareceram? Por quê?
```sql
SELECT alunos.nome,emprestimos.livro FROM emprestimos
INNER JOIN alunos ON emprestimos.id_aluno = alunos.id;
```
Os alunos que não aparecem, não apareceram porque essa consulta só busca os alunos que tem relação entre as duas tabelas, ou seja, que tem o nome na tabela alunos, e que fizeram um empréstimo.

5- Usando LEFT JOIN, mostre TODOS os alunos e o livro de cada um.
   Responda: o que apareceu na coluna livro para quem não pegou nenhum livro?
```sql
SELECT alunos.nome,emprestimos.livro FROM alunos
LEFT JOIN emprestimos ON emprestimos.id_aluno = alunos.id;  
```
Os alunos que não pegaram nenhum livro apareceram na tabela, mas na coluna livro, está null. Isso significa que eles não pegaram nenhum livro e o valor é nulo.

6- A bibliotecária quer saber quem NUNCA pegou livro.
   Escreva a consulta que mostra só esses alunos.
```sql
SELECT alunos.nome,emprestimos.livro FROM alunos
LEFT JOIN emprestimos ON emprestimos.id_aluno = alunos.id
WHERE emprestimos.id IS NULL;
```

7- Tente registrar um empréstimo para o aluno 50:
   INSERT INTO emprestimos (livro, id_aluno) VALUES ('Turma da Mônica', 50);
   Responda: o que aconteceu? Por quê?
```sql
INSERT INTO emprestimos (livro, id_aluno) VALUES ('Turma da Mônica', 50);
```
Deu erro porque o aluno com o ID 50 não existe na tabela alunos, já que os IDs vão só até o 15. Então o banco não deixa cadastrar o empréstimo, porque não existe um aluno correspondente ao ID 50.