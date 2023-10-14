import { Component, ElementRef, EventEmitter, Output, ViewChild } from '@angular/core';
import { FormArray, FormBuilder, FormControl, FormGroup, Validators } from '@angular/forms';
import { Classe } from 'src/app/shared/interfaces/models/classe';
import { Cours } from 'src/app/shared/interfaces/models/cours';
import { Module } from 'src/app/shared/interfaces/models/module';
import { Prof } from 'src/app/shared/interfaces/models/prof';
import { ModuleSerResou } from 'src/app/shared/interfaces/services/module-ser-resou';
import { getObjectById } from 'src/app/shared/utils/fonctions/fonctions';

@Component({
  selector: 'app-add-module',
  templateUrl: './add-module.component.html',
  styleUrls: ['./add-module.component.css']
})
export class AddModuleComponent {
  addCoursFormGroup!: FormGroup;
  modules: Module[] = [];
  profs: Prof[] = [];
  classes: Classe[] = [];

  @ViewChild('msgInfo') msgInfo!: ElementRef;

  @Output() onSubmitCoursEmmitter: EventEmitter<Cours> = new EventEmitter<Cours>();



  constructor(private fb: FormBuilder){
    this.addCoursFormGroup = this.fb.group({
      module: [null, [Validators.required, Validators.min(1)]],
      prof: [null, [Validators.required, Validators.min(1)]],
      classes:this.fb.array([])
    });
    this.ajouterLigne();
  }



  // Fonction pour ajouter une ligne
  ajouterLigne() {
    this.classesCtrl.push(createLine(this.fb, this.validateUniqueClasse.bind(this)));
  }

  // Fonction pour supprimer une ligne
  supprimerLigne(index: number) {
    if(this.classesCtrl.length > 1) this.classesCtrl.removeAt(index);
  }


  initialiseData(data: ModuleSerResou) {
    this.modules = data.module;
    this.classes = data.classe;
  }

  resetFormGrp() {
    this.addCoursFormGroup.reset();
  }

  onModuleChange(idModule: number) {
    // const idModule = +(event.target as HTMLSelectElement).value;
    this.profCtrl.setValue(null);
    if (idModule >=1) this.profs = getObjectById<Module>(this.modules, idModule)?.professeurs!;
    else this.profs = [];
  }

  validateUniqueClasse(control: FormControl) {
    const classe = control.value;
    const classes = this.classesCtrl.controls.map(line => line.get('classe')?.value);
  
    if (classes.filter(c => c === classe).length > 1) {
      return { invalidUniq: true };
    }
  
    return null;
  }

  // onResetClick(){
  //   this.profs = [];
  // }

  saveData(){
    const cours: Cours = this.addCoursFormGroup.getRawValue();
    this.onSubmitCoursEmmitter.emit(cours);
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

}


function createLine(formBuilder: FormBuilder, validate: Validators){
  const line = formBuilder.group({
    classe: [null, [Validators.required, Validators.min(1), validate]],
    heure: [null, [Validators.required, Validators.min(0)]],
  });
  return line;
}

