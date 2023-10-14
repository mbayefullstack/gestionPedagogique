import { Component, OnInit, ViewChild } from '@angular/core';
import { ModuleService } from './shared/services/module.service';
import { ApiResponse } from '../../shared/interfaces/api-response';
import { ModuleSerResou } from '../../shared/interfaces/services/module-ser-resou';
import { AddModuleComponent } from './add-module/add-module.component';
import { Cours } from '../../shared/interfaces/models/cours';
import { NotionationService } from '../../shared/services/notionation.service';
import { CoursService } from '../../shared/services/models/cours.service';

@Component({
  selector: 'app-module',
  templateUrl: './module.component.html',
  styleUrls: ['./module.component.css']
})
export class ModuleComponent implements OnInit {
  @ViewChild(AddModuleComponent, {static: false}) childAddModule: AddModuleComponent = <AddModuleComponent>{};


  constructor(private moduleService: ModuleService, private coursService: CoursService, private notificationService: NotionationService){}

  ngOnInit() {
    this.moduleService.getAll().subscribe({
      next: 
      (response:ApiResponse<ModuleSerResou>) => {
        this.childAddModule.initialiseData(response.data);
      },
      error: (err: Error) => console.error('Une erreur s\'est produite : ' + err),
      complete: () => console.log('Observer got a complete notificationcool tout ok'),
    });
  };


  onSubmitCoursEmmitter(cours: Cours){
    this.coursService.add(cours).subscribe({
      next: 
      (response:ApiResponse<any>) => {
        if(response.status == 200){
          this.notificationService.afficherMessage(this.childAddModule.msgInfo, response.message, "alert-success");
          this.childAddModule.resetFormGrp();
        }else{
          this.notificationService.afficherMessage(this.childAddModule.msgInfo, response.message, "alert-danger");
        }
      },
      error: (err: Error) => console.error('Une erreur s\'est produite : ' + err),
      complete: () => console.log('Observer got a complete notificationcool tout ok'),
    });
  }

}
