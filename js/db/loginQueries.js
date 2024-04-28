import { connect } from './db.js';

// import {
//     login,
//     senha
// } from '../login';

let login = "institutoOliveira@gmail.com";
let senha = "administr@dor2024";

export async function getUsuario() {
    const sql = `SELECT login, senha FROM usuarios WHERE login == "${login}" AND senha == "${senha}";`;
    const conn = await connect();
    const usuario = await conn.query(sql, []); 
    console.log(usuario);   
}

getUsuario();
