import { ComponentFixture, TestBed } from '@angular/core/testing';

import { CalendrierFormComponent } from './calendrier-form.component';

describe('CalendrierFormComponent', () => {
  let component: CalendrierFormComponent;
  let fixture: ComponentFixture<CalendrierFormComponent>;

  beforeEach(() => {
    TestBed.configureTestingModule({
      declarations: [CalendrierFormComponent]
    });
    fixture = TestBed.createComponent(CalendrierFormComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
