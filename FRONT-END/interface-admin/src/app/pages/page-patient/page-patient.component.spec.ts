import { ComponentFixture, TestBed } from '@angular/core/testing';

import { PagePatientComponent } from './page-patient.component';

describe('PagePatientComponent', () => {
  let component: PagePatientComponent;
  let fixture: ComponentFixture<PagePatientComponent>;

  beforeEach(() => {
    TestBed.configureTestingModule({
      declarations: [PagePatientComponent]
    });
    fixture = TestBed.createComponent(PagePatientComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
