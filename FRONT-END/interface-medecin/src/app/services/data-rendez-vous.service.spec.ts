import { TestBed } from '@angular/core/testing';

import { DataRendezVousService } from './data-rendez-vous.service';

describe('DataRendezVousService', () => {
  let service: DataRendezVousService;

  beforeEach(() => {
    TestBed.configureTestingModule({});
    service = TestBed.inject(DataRendezVousService);
  });

  it('should be created', () => {
    expect(service).toBeTruthy();
  });
});
