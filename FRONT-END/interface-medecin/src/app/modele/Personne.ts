export class Personne {
  public nom?: string;
  public mail?: string;
  public age?: number;
  public city?: string;

  constructor(nom?: string, mail?: string, age?: number, city?: string){
    this.nom=nom;
    this.mail=mail;
    this.age=age;
    this.city=city;
  }
}
