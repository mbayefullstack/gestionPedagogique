import { Component } from '@angular/core';
import { FormArray, FormBuilder, FormControl, FormGroup, Validators } from '@angular/forms';
import { Router } from '@angular/router';
import { th } from 'date-fns/locale';
import { Classe } from 'src/app/shared/interfaces/models/classe';
import { Module } from 'src/app/shared/interfaces/models/module';
import { Prof } from 'src/app/shared/interfaces/models/prof';
import { ModuleSerResou } from 'src/app/shared/interfaces/services/module-ser-resou';
import { getObjectById } from 'src/app/shared/utils/fonctions/fonctions';

@Component({
  selector: 'app-form-sesion',
  templateUrl: './form-sesion.component.html',
  styleUrls: ['./form-sesion.component.css']
})
export class FormSesionComponent {
  addCoursFormGroup!: FormGroup;
  // modules: Module[] = [];
  modules = [
    {id: 1, libelle: "TOUT"},
   {id: 2, libelle: 'EN COURS'},
   {id: 3, libelle: 'TERMINE'},
   {id: 4, libelle: 'ANNULER'},
   {id: 5, libelle: 'DEMANDE ANNULER'},
   {id: 6, libelle: 'VALIDER'},
 ];
  // profs: Prof[] = [];
  profs = [
    {id: 1, prenom: "Ibrahim", nom: "Diao"},
    {id: 2, prenom: 'Moussa', nom: "Doumbya"},
    {id: 3, prenom: 'Khady', nom: "Gueye"},
    {id: 4, prenom: 'Silmang', nom: "Sarr"},
    {id: 5, prenom: 'Sira', nom: "Diallo"},
    {id: 6, prenom: 'Malick', nom: "Mendy"},
  ];
  classes: Classe[] = [];


  constructor(private fb: FormBuilder, private router: Router){
    this.addCoursFormGroup = this.fb.group({
      module: [null, [Validators.required, Validators.min(1)]],
      prof: [null, [Validators.required, Validators.min(1)]],
      classes:this.fb.array([])
    });
  }

  initialiseData(data: ModuleSerResou) {
    // this.modules = data.module;
    this.classes = data.classe;
  }

  resetFormGrp() {
    this.addCoursFormGroup.reset();
  }

  onModuleChange(idModule: number) {
    this.profCtrl.setValue(null);
    // if (idModule >=1) this.profs = getObjectById<Module>(this.modules, idModule)?.professeurs!;
    // else this.profs = [];
  }


  saveData(){
    alert(123)
  }

  get moduleCtrl() {
    return this.addCoursFormGroup.get('module') as FormControl;
  }

  get profCtrl() {
    return this.addCoursFormGroup.get('prof') as FormControl;
  }

  get classesCtrl() {
    return this.addCoursFormGroup.get('classes') as FormArray;
  }




  goToPart(fragment: any){
    this.router.navigateByUrl('home/navigation/cours#'+fragment);
  }

}
