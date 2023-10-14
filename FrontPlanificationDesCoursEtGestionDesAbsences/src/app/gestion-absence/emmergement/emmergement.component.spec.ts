import { ComponentFixture, TestBed } from '@angular/core/testing';

import { EmmergementComponent } from './emmergement.component';

describe('EmmergementComponent', () => {
  let component: EmmergementComponent;
  let fixture: ComponentFixture<EmmergementComponent>;

  beforeEach(() => {
    TestBed.configureTestingModule({
      declarations: [EmmergementComponent]
    });
    fixture = TestBed.createComponent(EmmergementComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
