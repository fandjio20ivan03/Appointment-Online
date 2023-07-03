import { ComponentFixture, TestBed } from '@angular/core/testing';

import { PageAcceuilComponent } from './page-acceuil.component';

describe('PageAcceuilComponent', () => {
  let component: PageAcceuilComponent;
  let fixture: ComponentFixture<PageAcceuilComponent>;

  beforeEach(() => {
    TestBed.configureTestingModule({
      declarations: [PageAcceuilComponent]
    });
    fixture = TestBed.createComponent(PageAcceuilComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
