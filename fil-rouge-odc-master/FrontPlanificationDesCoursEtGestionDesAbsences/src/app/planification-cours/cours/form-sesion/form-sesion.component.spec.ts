import { ComponentFixture, TestBed } from '@angular/core/testing';

import { FormSesionComponent } from './form-sesion.component';

describe('FormSesionComponent', () => {
  let component: FormSesionComponent;
  let fixture: ComponentFixture<FormSesionComponent>;

  beforeEach(() => {
    TestBed.configureTestingModule({
      declarations: [FormSesionComponent]
    });
    fixture = TestBed.createComponent(FormSesionComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
