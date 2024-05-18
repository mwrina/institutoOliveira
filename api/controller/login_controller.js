import connect from "../config/connection.js";

let aluno = {}

const con = await connect();

usuario.all = async function (req, res)
{

    try 
    {
        let usuarios = await con.query(`SELECT * FROM usuarios;`);

        res.send(usuarios);
    }
    catch (err)
    {
        console.log("erro consulta..........", err);
    }
}

usuario.create = async function (req, res) {
    try {

        let usuarios = req.body;

        let sql = `INSERT INTO usuarios(nome, email, senha)
                    VALUES (?,?,?);`
        
        let values = [usuarios.nome, usuarios.email, usuarios.senha];
        
        let result = await con.query(sql, values);

        res.send({
            status: "Inserção realizada com sucesso.",
            result: result
        });

    } catch (err) {
        console.log("Erro.........", err);
        
    }
}

usuarios.update = async function (req, res) {

    try {

        let idUsu = req.params.idUsu;

        let usuarios = req.body;

        let sql = `UPDATE usuarios SET nome = ?, email = ? WHERE matricula = ?;`
        const values = [usuarios.nome, usuarios.email, idUsu];

        let result = await con.query(sql, values);
        
        res.send({
            status: `Atualização do usuário de id ${idUsu} realizada com sucesso!`,
            result: result
        });

    } catch (err) {
        console.log("Erro........", err);
    }

}

usuarios.delete = async function (req, res) {

    try {

        let idUsu = req.params.idUsu;

        let sql = `DELETE FROM aluno WHERE matricula = ?;`

        let result = await con.query(sql, [idUsu]);

        res.send({
            status: `Exclusão do usuário de id ${idUsu} realizada com sucesso!`,
            result: result
        });

    } catch (err) {
        console.log("Erro..........", err);
    }

}

export {aluno}