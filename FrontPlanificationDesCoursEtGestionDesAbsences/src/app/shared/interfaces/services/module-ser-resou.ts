import { Module } from "../models/module"
import { Classe } from "../models/classe"

export interface ModuleSerResou {
    module: Module[]
    classe: Classe[]
}
