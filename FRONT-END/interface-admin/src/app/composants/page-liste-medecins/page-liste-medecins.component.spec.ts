import { ComponentFixture, TestBed } from '@angular/core/testing';

import { PageListeMedecinsComponent } from './page-liste-medecins.component';

describe('PageListeMedecinsComponent', () => {
  let component: PageListeMedecinsComponent;
  let fixture: ComponentFixture<PageListeMedecinsComponent>;

  beforeEach(() => {
    TestBed.configureTestingModule({
      declarations: [PageListeMedecinsComponent]
    });
    fixture = TestBed.createComponent(PageListeMedecinsComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
