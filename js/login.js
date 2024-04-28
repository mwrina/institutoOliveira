import {connect} from './db/connect';
import {getUsuario} from './db/getUsuarios';

export let login = document.getElementById('login');
export let senha = document.getElementById('senha');

getUsuario(login, senha);


