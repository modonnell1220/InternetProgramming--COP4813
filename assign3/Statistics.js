function findN(x)
{
	return x.length;
}

function findSum(x) 
{
    var sum = 0;
    for ( var i = 0; i < x.length; ++i) 
    {
        sum += x[i];
    }
    return sum;
}

function findMean(x)
{
    return (findSum(x) / findN(x)).toFixed(2);
}

function findMedian(x)
{
    x.sort(function(a,b) {return a-b}); //sort the numbers first
    var middle = Math.floor(x.length/2);
    if (findN(x) % 2)
        return x[middle];
    else
        return ((x[middle-1] + x[middle]) / 2).toFixed(2);
}

function findMode(x)
{
    var count = 0;
    var modeMap = {},
        maxEl = "",
        maxCount = 1;

    for(var i = 0; i < x.length; i++)
    {
        var el = x[i];

        if (modeMap[el] == null)
            modeMap[el] = 1;
        else
            modeMap[el]++;

        if (modeMap[el] > maxCount)
        {
            maxEl = el;
            maxCount = modeMap[el];
        }
        else if (modeMap[el] == maxCount)
        {
            if (count == 0)
            {
                maxEl += el;
                maxCount = modeMap[el];
                count = 1;
            }
            else 
            {
                maxEl += ', ' + el;
                maxCount = modeMap[el];
            }     
        }
    }
    return maxEl;
}

function findVariance(x)
{
    var mean =  findMean(x);
    var secondMean = 0;
    for(var i = 0; i < x.length; ++i)
    {
        var sub = x[i] - mean;
        secondMean += Math.pow(sub, 2);
    }
    var variance = secondMean / findN(x);
    return variance.toFixed(2);    
}

function findStandardDeviation(x)
{
    var stdev = Math.pow(findVariance(x), 0.5);
    return stdev.toFixed(2);
}