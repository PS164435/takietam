%zad1
r = double(imread('rzeczka.jpg'));
[xwe,ywe] = skalowanie(r,333,222);
r2 = r(ywe, xwe, :);
imwrite(uint8(r2), 'zad1.jpg');

%zad2
r = double(imread('rzeczka_mniejsza.jpg'));
[xwe,ywe] = skalowanie(r,1366,768);
r2 = r(ywe, xwe, :);
imwrite(uint8(r2), 'zad2.jpg');

%zad3
r = double(imread('logo_linuxa.png'));
[xwe,ywe] = skalowanie(r,672,788);
r2 = r(ywe, xwe, :);
imwrite(uint8(r2), 'zad3.png'); % w poleceniu jest 672x788 a obrazek jest zrobiony dla 788x672

%zad4
r = double(imread('zrzut_1.png'));
[xwe,ywe] = skalowanie(r,900,432);
r2 = r(ywe, xwe, :);
imwrite(uint8(r2), 'zad4.png');

%zad5
r = double(imread('zrzut_1.png'));
[xwe,ywe] = skalowanie(r,600,246);
r2 = r(ywe,xwe,:);
imwrite(uint8(r2),'zad5.png');

%zad6
r = double(imread('zrzut_1.png'));
[xwe,ywe] = skalowanie(r,400,400);
r2 = r(ywe,xwe,:);
[xwe,ywe] = skalowanie(r2,size(r,2),size(r,1));
r2 = r2(ywe,xwe,:);
imwrite(uint8(r2),'zad6.png');










