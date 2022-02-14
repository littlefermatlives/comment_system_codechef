s = input()
t = input()
cnt1 = 0
cnt2 = 0
for items in s:
    if items == 'a' or items == 'i' or items == 'o' or items == 'e' or items == 'u':
        cnt1 = cnt1 + 1

for items in t:
    if items == 'a' or items == 'i' or items == 'o' or items == 'e' or items == 'u':
        cnt2 = cnt2 + 1

if cnt1 > cnt2:
    print(cnt1, s, end=" ")
else:
    print(cnt2, t, end=" ")
