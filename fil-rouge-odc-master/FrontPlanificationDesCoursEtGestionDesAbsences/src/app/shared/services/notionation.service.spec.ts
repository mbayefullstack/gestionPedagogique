import { TestBed } from '@angular/core/testing';

import { NotionationService } from './notionation.service';

describe('NotionationService', () => {
  let service: NotionationService;

  beforeEach(() => {
    TestBed.configureTestingModule({});
    service = TestBed.inject(NotionationService);
  });

  it('should be created', () => {
    expect(service).toBeTruthy();
  });
});
