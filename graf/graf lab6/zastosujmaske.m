## Copyright (C) 2024 Jacek
##
## This program is free software: you can redistribute it and/or modify
## it under the terms of the GNU General Public License as published by
## the Free Software Foundation, either version 3 of the License, or
## (at your option) any later version.
##
## This program is distributed in the hope that it will be useful,
## but WITHOUT ANY WARRANTY; without even the implied warranty of
## MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
## GNU General Public License for more details.
##
## You should have received a copy of the GNU General Public License
## along with this program.  If not, see <https://www.gnu.org/licenses/>.

## -*- texinfo -*-
## @deftypefn {} {@var{retval} =} zastosujmaske (@var{input1}, @var{input2})
##
## @seealso{}
## @end deftypefn

## Author: Jacek <Jacek@DESKTOP-50EU0VR>
## Created: 2024-01-04





% funkcja do używania maski na obiektach
% obiektem może byc zarówno obrazek (macierz 3-wymiarowa) lub zwykła macierz 2-wymiarowa
% funkcja działa na masce dowolnej nieparzystej wielkości np. 5x9, 11x3 itp. a nie tylko na 3x3
function wyjscie = zastosujmaske(obr, maska)
wyjscie = obr;
gm1 = (size(maska,1)-1)/2;
gm2 = (size(maska,2)-1)/2;
for n = 1:size(obr,3)
r = obr(:,:,n);
r2 = zeros(size(r,1)+2*gm1,size(r,2)+2*gm2);
r2(1+gm1:end-gm1, 1+gm2:end-gm2) = r;
for i = 1:gm1
r2(i,:) = r2(gm1+1,:);
r2(end+1-i,:) = r2(end-gm1,:);
end
for i = 1:gm2
r2(:,i) = r2(:,gm2+1);
r2(:,end+1-i) = r2(:,end-gm2);
end
r3 = zeros(size(r));
for i = (-gm1:gm1)
for j = (-gm2:gm2)
r3 += r2(gm1+1+i:end-gm1+i, gm2+1+j:end-gm2+j)*maska(i+gm1+1,j+gm2+1);
end
end
wyjscie(:,:,n)=r3;
end
endfunction
