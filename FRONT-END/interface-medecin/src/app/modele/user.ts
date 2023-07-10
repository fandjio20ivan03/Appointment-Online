export class User {
  public id?: number;
  public nom?: string;
  public sexe?: string;
  public age?: number;

  constructor(id?: number, nom?: string, sexe?: string, age?: number){
    this.id=id;
    this.nom=nom;
    this.sexe=sexe;
    this.age=age;
  }

}
