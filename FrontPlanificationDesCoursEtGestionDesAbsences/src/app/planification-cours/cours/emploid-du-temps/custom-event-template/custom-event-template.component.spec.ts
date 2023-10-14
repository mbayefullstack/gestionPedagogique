import { ComponentFixture, TestBed } from '@angular/core/testing';

import { CustomEventTemplateComponent } from './custom-event-template.component';

describe('CustomEventTemplateComponent', () => {
  let component: CustomEventTemplateComponent;
  let fixture: ComponentFixture<CustomEventTemplateComponent>;

  beforeEach(() => {
    TestBed.configureTestingModule({
      declarations: [CustomEventTemplateComponent]
    });
    fixture = TestBed.createComponent(CustomEventTemplateComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
