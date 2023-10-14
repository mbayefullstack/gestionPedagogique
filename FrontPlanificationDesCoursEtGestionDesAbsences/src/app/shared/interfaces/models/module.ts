import { Prof } from "./prof"

export interface Module {
    id?: number
    libelle: string
    professeurs: Prof[]
}
