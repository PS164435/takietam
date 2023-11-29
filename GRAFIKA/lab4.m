rzeczka_unit8 = imread('rzeczka.jpg');
rzeczka = double(rzeczka_unit8);

%Zadanie 1
rzeczkagamma = (rzeczka / 255) .^ (1/1.5);

rzeczkagamma = rzeczkagamma * 255;

function wynik = PrzytnijZakres(wejscie)
    wynik = wejscie;
    wynik(wynik < 0) = 0;
    wynik(wynik > 255) = 255;
end
%

function wynik = porownanievPS(wejscies, wejscien, mnoznik)
  module = abs(wejscien - wejscies);
  wynik = PrzytnijZakres(mnoznik*module);
end
%

function wynik = porownaniev2(wejscies, wejscien, mnoznik)
  wynik = PrzytnijZakres(mnoznik*(wejscien - wejscies) + 127.5);
end
%
test1 = porownanievPS(rzeczka,rzeczkagamma,4);
test2 = porownaniev2(rzeczka,rzeczkagamma,3);

%{
figure(1);
subplot(2,2,1);
imshow(rzeczka / 255);
title('org');
subplot(2,2,2);
imshow(rzeczkagamma / 255);
title('gamma');
subplot(2,2,3);
imshow(test1 / 255);
title('porwnanievPS * 4');
subplot(2,2,4);
imshow(test2 / 255);
title('porwonaniev2 * 3');
%}

%Zadanie 2


function srednia = SzaroscSrednia(r, g, b)
  srednia = (r+g+b) /3;
end

function srednia = SzaroscSzary(r, g, b)
  srednia = (0.2126*r+0.7152*g+0.0722*b);
end
%
kanal_r = rzeczka(:,:,1);
kanal_g = rzeczka(:,:,2);
kanal_b = rzeczka(:,:,3);

zadanie2 = SzaroscSrednia(kanal_r,kanal_g,kanal_b);
zadanie2b = SzaroscSzary(kanal_r,kanal_g,kanal_b);
zadanie2c = porownanievPS(zadanie2b, zadanie2,4);
zadanie2d = porownaniev2(zadanie2b, zadanie2,3);

%{
figure(2);
subplot(2,2,1);
imshow(zadanie2b / 255);
title('Szary');
subplot(2,2,2);
imshow(zadanie2 / 255);
title('Srednia');
subplot(2,2,3);
imshow(zadanie2c / 255);
title('porwnanievPS * 4');
subplot(2,2,4);
imshow(zadanie2d / 255);
title('porwonaniev2 * 3');
%}

%Zadanie3

Y=0 + 0.299*kanal_r + 0.587*kanal_g + 0.114*kanal_b;
Cb=128 - 0.168736 * kanal_r - 0.331264 * kanal_g + 0.5 * kanal_b;
Cr=128 + 0.5*kanal_r - 0.418688*kanal_g - 0.081312*kanal_b;

%{
figure(3);
subplot(2,2,1);
imshow(rzeczka / 255);
title('RGB');
subplot(2,2,2);
imshow(Y / 255);
title('Y');
subplot(2,2,3);
imshow(Cb / 255);
title('Cb');
subplot(2,2,4);
imshow(Cr / 255);
title('Cr');
%}

%Zadanie4

R=Y + 1.402*(Cr-128) ;
G=Y-0.344136*(Cb-128)-0.714136*(Cr-128);
B=Y +1.772*(Cb-128);

zadanie4 = rzeczka;
zadanie4(:,:,1) = R;
zadanie4(:,:,2) = G;
zadanie4(:,:,3) = B;

%{
figure(4);
subplot(1,2,1);
imshow(porownanievPS(rzeczka,zadanie4, 1000000) /255);
title('vps * 1000000');
subplot(1,2,2);
imshow(porownaniev2(rzeczka,zadanie4, 1000000) / 255);
title('v2 * 1 000 000');
%}


%Zadanie5

zadanie5 = rzeczka;

Y1 = round(Y);
Cb1 = round(Cb);
Cr1 = round(Cr);

R1=Y1 + 1.402*(Cr1-128) ;
G1=Y1-0.344136*(Cb1-128)-0.714136*(Cr1-128);
B1=Y1 +1.772*(Cb1-128);

zadanie5(:,:,1) = R1;
zadanie5(:,:,2) = G1;
zadanie5(:,:,3) = B1;

zadanie52 = zadanie5;

zadanie52(:,:,1) = round(zadanie52(:,:,1));
zadanie52(:,:,2) = round(zadanie52(:,:,2));
zadanie52(:,:,3) = round(zadanie52(:,:,3));

zadanie5b = porownanievPS(rzeczka,zadanie52, 250);
zadanie5c = porownaniev2(rzeczka,zadanie52, 300);

diff = abs(rzeczka(:,:,1) - zadanie52(:,:,1)) + abs(rzeczka(:,:,2) - zadanie52(:,:,2)) + abs(rzeczka(:,:,3) - zadanie52(:,:,3));

%{
figure(5);
subplot(2,2,1);
imshow(rzeczka/255);
title('org');
subplot(2,2,2);
imshow(zadanie5 / 255);
title('YCbCr to RGB');
subplot(2,2,3);
imshow(zadanie5b / 255);
title('250');
subplot(2,2,4);
imshow(zadanie5c /255);
title('300');
%}

%Zadanie6

Y2=0 + 0.299*kanal_r + 0.587*kanal_g + 0.114*kanal_b;
Cb2=128 - 0.168736 * kanal_r - 0.331264 * kanal_g + 0.5 * kanal_b;
Cr2=128 + 0.5*kanal_r - 0.418688*kanal_g - 0.081312*kanal_b;

Y2 = Y2 / 255;
Y2 =  Y2 .^ (1/1.5);
Y2 = Y2 * 255;

R3=Y2 + 1.402*(Cr-128) ;
G3=Y2-0.344136*(Cb-128)-0.714136*(Cr-128);
B3=Y2 +1.772*(Cb-128);

zadanie6 = rzeczka;

zadanie6(:,:,1) = R3;
zadanie6(:,:,2) = G3;
zadanie6(:,:,3) = B3;

zadanie6b = porownanievPS(rzeczkagamma, zadanie6, 50);
zadanie6c = porownaniev2(rzeczkagamma, zadanie6, 50);

%{
figure(6);
subplot(2,2,1);
imshow(rzeczkagamma /255);
title('rgb gamma');
subplot(2,2,2);
imshow(zadanie6 / 255);
title('Y gamma');
subplot(2,2,3);
imshow(zadanie6b / 255);
title('VPS50');
subplot(2,2,4);
imshow(zadanie6c / 255);
title('V250');
%}

%Zadanie7

Cbnew = PrzytnijZakres(128+(Cb - 128) * 1.5);
Crnew = PrzytnijZakres(128 +(Cr - 128) * 1.5);

R4=Y + 1.402*(Crnew-128) ;
G4=Y-0.344136*(Cbnew-128)-0.714136*(Crnew-128);
B4=Y +1.772*(Cbnew-128);

zadanie7 = rzeczka;
zadanie7(:,:,1) = R4;
zadanie7(:,:,2) = G4;
zadanie7(:,:,3) = B4;

zadanie7b = porownanievPS(rzeczka, zadanie7, 10);
zadanie7c = porownaniev2(rzeczka,zadanie7, 10);

figure(7);
subplot(2,2,1);
imshow(rzeczka /255);
title('org');
subplot(2,2,2);
imshow(zadanie7 / 255);
title('Ycbcr *1,5');
subplot(2,2,3);
imshow(zadanie7b / 255);
title('VPS10');
subplot(2,2,4);
imshow(zadanie7c / 255);
title('V210')
