function centuryFromYear($year): int
{
  // take the year value and -1 and / 100.  round down and add 1 = centuary
  return 1 + floor((($year-1)/100));
}
