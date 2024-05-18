import express from "express";

import {usuarios} from "../controller/login_controller.js";

let router = express.Router();

router.get("/usuarios", usuarios.all);
router.post('/usuarios', usuarios.create);
router.put('/usuarios/:idUsu', usuarios.update);
router.delete('/usuarios/:idUsu', usuarios.delete);


export {router};