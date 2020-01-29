import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { CartPurchaseComponent } from './cart-purchase.component';

describe('CartPurchaseComponent', () => {
  let component: CartPurchaseComponent;
  let fixture: ComponentFixture<CartPurchaseComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ CartPurchaseComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(CartPurchaseComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
