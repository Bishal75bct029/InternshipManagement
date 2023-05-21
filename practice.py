import numpy

row = int(input())
column = int(input())

num = [row][column]

for i in range(row):
    for i in range(column):
        num[row][column] = int(input())
        
num = numpy.array(num)
print(row,' ',column)
print(numpy.transpose(num))
print(numpy.flatten(num))