clear;
rzeczka_unit8 = imread('rzeczka2.png');
rzeczka = double(rzeczka_unit8);

%imshow(rzeczka / 255);
%Zadanie 1 i Zadanie 2

%plot i subplot do podzialu

wejscie = vec(rzeczka);
wejscie = wejscie / 255;

wyjscie = wejscie .^ (1/0.7);
wyjsciev2 = wejscie .^ (1/1.5);

%{
figure;
subplot(1,2,1);
plot(wejscie,wyjscie);
subplot(1,2,2);
plot(wejscie,wyjsciev2);
%}

tmp = (rzeczka / 255) .^ (1/0.7);


figure;
subplot(1,2,1);
imshow(rzeczka /255);
title('rzeczka');
subplot(1,2,2);
imshow(tmp);
title('gamma 0.7');

% Zadanie3

function wynik = PrzytnijZakres(wejscie)
    wynik = wejscie;
    wynik(wynik < 0) = 0;
    wynik(wynik > 255) = 255;
end


function wyjscie = ZmienJasnosc(wejscie, wspJasnosci)
  yjasnosc = wspJasnosci;
  yjasnosc(yjasnosc < -255) = -255;
  yjasnosc(yjasnosc > 255) = 255;
  wyjscie = PrzytnijZakres(wejscie + yjasnosc);
end

Jasnosc1 = 50;
Jasnosc2 = -50;

test = [0:1:255];

result1 = ZmienJasnosc(test, Jasnosc1);
result2 = ZmienJasnosc(test, Jasnosc2);

%Wykres
%{
figure;
plot(test,'b', result1, 'r',result2, 'g');
%}

result3 = ZmienJasnosc(rzeczka, Jasnosc1);
result4 = ZmienJasnosc(rzeczka, Jasnosc2);
%Obrazki
%{
figure;
subplot(1,3,1);
imshow(rzeczka /255);
title('org');
subplot(1,3,2);
imshow(result3 /255);
title('+50');
subplot(1,3,3);
imshow(result4 /255);
title('-50');
%}

% Zadanie 4

LUT = PrzytnijZakres(test + 50);

%{
figure;
plot(LUT);
%}
function wyjscie = LUT_zastosuj(wejscie, LUT)
  zaokraglij = round(wejscie);
  wyjscie = LUT(zaokraglij + 1);
end

result5 = LUT_zastosuj(rzeczka, LUT);
%{
figure;
imshow(result5 /255);
%}

% Zadanie 5

LUT2 = [0:1:255] / 255;

result6 = LUT2 .^(1/1.5);

result6 = result6 * 255;

result7 = LUT_zastosuj(rzeczka, result6);
%{
figure;
plot(result6);
figure;
subplot(1,2,1)
imshow(rzeczka/255);
title('zadanie5 przed');
subplot(1,2,2)
imshow(result7/255);
title('zadanie5 po');
%}

% Zadanie 6


function wyjscie = ZmienKontrast(wejscie, wspKontrastu)
  wspMn = ((255 + wspKontrastu)/255)^2;
  wyjscie = 127.5 + (wejscie - 127.5) * wspMn;
  wyjscie = PrzytnijZakres(wyjscie);
end


kontrast60p = 60;
kontrast60m = -60;
arr = (0:1:255);

result8 = ZmienKontrast(arr,kontrast60p);
result9 = ZmienKontrast(arr,kontrast60m);

LUT4 = LUT_zastosuj(rzeczka,result8);
LUT5 = LUT_zastosuj(rzeczka,result9);
%{
figure;
plot(arr,'r',result8,'g',result9,'b');
title('kontrast+60');
%}

%{
figure;
subplot(1,3,1);
imshow(LUT4/255);
title('+60');
subplot(1,3,2);
imshow(rzeczka/255);
title('default');
subplot(1,3,3);
imshow(LUT5/255);
title('-50');
%}

% Zadanie7

function LUT = UtworzLUTCzerwony()
    LUT = [0:1:255];

    for i = 0:255

        if i < 60
            wy = i * 2;
        elseif i < 110
            wy = 120 - (i- 60)/5;
        else
            wy = 110 + (i - 110);
            if wy > 255
              wy = 255;
            endif
        end

        LUT(i + 1) = wy;
    end
end

function LUT = UtworzLUTNiebieski()
    LUT = [0:1:255];

    for i = 0:255
        if i < 50
            wy = 0;

        else
            wy = (i- 50)*1.25;
            if wy > 255;
              wy =255;
            endif
        end

        LUT(i + 1) = wy;
    end
end

czerwony = UtworzLUTCzerwony();
niebieski = UtworzLUTNiebieski;

%{
figure;
plot(czerwony,'r', arr,'g.', niebieski, 'b');
%}

kanal_r = rzeczka(:,:,1);
kanal_g = rzeczka(:,:,2);
kanal_b = rzeczka(:,:,3);

scalr = LUT_zastosuj(kanal_r,czerwony);
scalg = LUT_zastosuj(kanal_g,arr);
scalb = LUT_zastosuj(kanal_b,niebieski);

final2 = cat(3,scalr,scalg,scalb);

%{
figure;
imshow(final2/255);
%}