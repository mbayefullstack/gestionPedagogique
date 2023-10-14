import { HttpClient } from '@angular/common/http';
import { Injectable } from '@angular/core';
import { Observable, catchError, tap, throwError } from 'rxjs';
import { ApiResponse } from '../../../../shared/interfaces/api-response';
import { ModuleSerResou } from '../../../../shared/interfaces/services/module-ser-resou';
import { environment } from '../../../../../environments/environment';

@Injectable({
  providedIn: 'root'
})
export class ModuleService {

  constructor(private httpClient:HttpClient) { }

  get endPointUrl(): string {
    return "services/";
  }

  getAll(): Observable<ApiResponse<ModuleSerResou>> {
    const apiUrl = `${environment.api.baseUrl}${this.endPointUrl}modules`;
    return this.httpClient.get<ApiResponse<ModuleSerResou>>(apiUrl).pipe(
      tap(response => {
        console.log('Données reçues:', response);
      }),
      catchError(error => {
        console.error('Une erreur s\'est produite:', error);
        return throwError(()=>new Error("Erreur lors de la récupération des données."));
      })
    );
  }
}
