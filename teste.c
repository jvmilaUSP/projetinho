
int LerDDP(int porta);
int max(int a, int b);
int ladoMaior(int lado1, int lado2);
void main(){
    int LD,LE,LF,LT; //respectivamente: leitura direita, esquerda, frontal e traseira
    int lado; //frontal e direito se 1, esquerdo e traseiro se 0
    int frontal, direito; //1 se esse é o lado de maior valor, 0 se é o oposto
    if (lado){ //ou seja, se estiver lendo frontal e direito
        LD = LerDDP(1);
        LF = LerDDP(2);
    } else{
        LE = LerDDP(1);
        LT = LerDDP(2);
    }
    direito = ladoMaior(LD,LE);
    frontal = ladoMaior(LF,LT);

    //delay 500
    if (lado){
        lado = 0;
    }
    else{
        lado = 1;
    }

}
int max(int a, int b){ //retorna o valor maximo 
    if (a > b)
    return a;
    else 
    return b;
}
int ladoMaior(int lado1, int lado2){ //retorna 1 se o lado maior é o primeiro valor, e 0 se for o 2
    if (max(lado1,lado2) == lado1){
        return 1;
    } else{
        return 0;
    }
}